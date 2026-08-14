<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    /**
     * Static Abellilo services and prices.
     */
    private function services()
    {
        return [
            'Hair Styling' => 8000,
            'Hair Braiding' => 10000,
            'Hair Wash' => 3000,
            'Hair Treatment' => 6000,
            'Hair Coloring' => 12000,
            'Hair Extensions' => 15000,
        ];
    }


    /**
     * Show booking page.
     */
    public function create($service)
    {
        $services = $this->services();

        if (!array_key_exists($service, $services)) {
            abort(404);
        }

        return view('booking.create', [
            'service' => $service,
            'price' => $services[$service],
        ]);
    }


    /**
     * Validate booking and initialize Paystack payment.
     */
    public function store(Request $request)
    {
        $services = $this->services();


        /*
        |--------------------------------------------------------------------------
        | Validate request
        |--------------------------------------------------------------------------
        */

        $request->validate([
            'service' => 'required|string',
            'booking_date' => 'required|date',
            'booking_time' => 'required|date_format:H:i',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Validate service
        |--------------------------------------------------------------------------
        */

        if (!array_key_exists($request->service, $services)) {

            return back()
                ->withErrors([
                    'service' => 'The selected service is invalid.'
                ])
                ->withInput();

        }


        /*
        |--------------------------------------------------------------------------
        | Validate date
        |--------------------------------------------------------------------------
        */

        $bookingDate = $request->booking_date;

        $dayOfWeek = date('N', strtotime($bookingDate));


        // Sunday

        if ($dayOfWeek == 7) {

            return back()
                ->withErrors([
                    'booking_date' =>
                        'Abellilo is closed on Sundays.'
                ])
                ->withInput();

        }


        // Past date

        if ($bookingDate < date('Y-m-d')) {

            return back()
                ->withErrors([
                    'booking_date' =>
                        'You cannot book a date in the past.'
                ])
                ->withInput();

        }


        /*
        |--------------------------------------------------------------------------
        | Validate time
        |--------------------------------------------------------------------------
        */

        $bookingTime = $request->booking_time;


        // Monday - Friday

        if ($dayOfWeek >= 1 && $dayOfWeek <= 5) {

            $openingTime = '09:00';
            $closingTime = '17:00';

        }

        // Saturday

        else {

            $openingTime = '09:00';
            $closingTime = '16:00';

        }


        if (
            $bookingTime < $openingTime ||
            $bookingTime > $closingTime
        ) {

            return back()
                ->withErrors([
                    'booking_time' =>
                        'The selected time is outside Abellilo opening hours.'
                ])
                ->withInput();

        }


        /*
        |--------------------------------------------------------------------------
        | Check availability
        |--------------------------------------------------------------------------
        */

        $alreadyBooked = Booking::where(
                'booking_date',
                $bookingDate
            )
            ->where(
                'booking_time',
                $bookingTime
            )
            ->whereIn('status', [
                'pending',
                'confirmed'
            ])
            ->exists();


        if ($alreadyBooked) {

            return back()
                ->withErrors([
                    'booking_time' =>
                        'This appointment time has already been booked. Please choose another time.'
                ])
                ->withInput();

        }


        /*
        |--------------------------------------------------------------------------
        | Get logged-in customer
        |--------------------------------------------------------------------------
        */

        $user = Auth::user();


        /*
        |--------------------------------------------------------------------------
        | Booking fee
        |--------------------------------------------------------------------------
        */

        $bookingFee = 100;


        /*
        |--------------------------------------------------------------------------
        | Generate unique Paystack reference
        |--------------------------------------------------------------------------
        */

        $reference =
            'ABELLILO_' .
            strtoupper(Str::random(20));


        /*
        |--------------------------------------------------------------------------
        | Create pending booking
        |--------------------------------------------------------------------------
        */

        $booking = Booking::create([

            'user_id' => $user->id,

            'service' => $request->service,

            'booking_date' => $bookingDate,

            'booking_time' => $bookingTime,

            'service_price' => $services[$request->service],

            'booking_fee' => $bookingFee,

            'status' => 'pending',

        ]);


        /*
        |--------------------------------------------------------------------------
        | Initialize Paystack transaction
        |--------------------------------------------------------------------------
        */

        $response = Http::withToken(
                config('services.paystack.secret_key')
            )
            ->post(
                config('services.paystack.payment_url')
                . '/transaction/initialize',
                [

                    'email' => $user->email,

                    // Paystack uses kobo

                    'amount' => $bookingFee * 100,

                    'reference' => $reference,

                    'callback_url' => route(
                        'payment.callback'
                    ),

                ]
            );


        /*
        |--------------------------------------------------------------------------
        | Paystack initialization failed
        |--------------------------------------------------------------------------
        */

        if (!$response->successful()) {

            $booking->delete();

            return back()
                ->withErrors([
                    'payment' =>
                        'Unable to initialize payment. Please try again.'
                ])
                ->withInput();

        }


        $data = $response->json();


        if (
            !isset($data['status']) ||
            !$data['status'] ||
            !isset($data['data']['authorization_url'])
        ) {

            $booking->delete();

            return back()
                ->withErrors([
                    'payment' =>
                        'Unable to initialize payment. Please try again.'
                ])
                ->withInput();

        }


        /*
        |--------------------------------------------------------------------------
        | Create pending payment record
        |--------------------------------------------------------------------------
        */

        Payment::create([

            'booking_id' => $booking->id,

            'user_id' => $user->id,

            'amount' => $bookingFee,

            'reference' => $reference,

            'status' => 'pending',

        ]);


        /*
        |--------------------------------------------------------------------------
        | Send customer to Paystack
        |--------------------------------------------------------------------------
        */

        return redirect(
            $data['data']['authorization_url']
        );
    }


    /**
     * Paystack callback.
     */
    public function callback(Request $request)
    {
        $reference = $request->query('reference');


        if (!$reference) {

            return redirect('/services')
                ->withErrors([
                    'payment' =>
                        'Payment reference was not provided.'
                ]);

        }


        /*
        |--------------------------------------------------------------------------
        | Find payment
        |--------------------------------------------------------------------------
        */

        $payment = Payment::where(
            'reference',
            $reference
        )->first();


        if (!$payment) {

            return redirect('/services')
                ->withErrors([
                    'payment' =>
                        'Payment record could not be found.'
                ]);

        }


        /*
        |--------------------------------------------------------------------------
        | Verify payment with Paystack
        |--------------------------------------------------------------------------
        */

        $response = Http::withToken(
                config('services.paystack.secret_key')
            )
            ->get(
                config('services.paystack.payment_url')
                . '/transaction/verify/'
                . urlencode($reference)
            );


        if (!$response->successful()) {

            return redirect('/services')
                ->withErrors([
                    'payment' =>
                        'Unable to verify payment.'
                ]);

        }


        $data = $response->json();


        /*
        |--------------------------------------------------------------------------
        | Make sure Paystack says payment succeeded
        |--------------------------------------------------------------------------
        */

        if (
            !isset($data['status']) ||
            !$data['status'] ||
            !isset($data['data']['status']) ||
            $data['data']['status'] !== 'success'
        ) {

            $payment->update([
                'status' => 'failed',
            ]);


            return redirect('/services')
                ->withErrors([
                    'payment' =>
                        'Payment was not successful.'
                ]);

        }


        /*
        |--------------------------------------------------------------------------
        | Verify amount
        |--------------------------------------------------------------------------
        */

        $paidAmount = $data['data']['amount'];

        $expectedAmount =
            (int) ($payment->amount * 100);


        if ($paidAmount !== $expectedAmount) {

            $payment->update([
                'status' => 'failed',
            ]);


            return redirect('/services')
                ->withErrors([
                    'payment' =>
                        'Payment amount could not be verified.'
                ]);

        }


        /*
        |--------------------------------------------------------------------------
        | Mark payment as successful
        |--------------------------------------------------------------------------
        */

        $payment->update([

            'status' => 'success',

            'paid_at' => now(),

        ]);


        /*
        |--------------------------------------------------------------------------
        | Confirm booking
        |--------------------------------------------------------------------------
        */

        $payment->booking->update([

            'status' => 'confirmed',

        ]);


        /*
        |--------------------------------------------------------------------------
        | Show confirmation
        |--------------------------------------------------------------------------
        */

        return view('booking.success', [

            'booking' => $payment->booking,

            'payment' => $payment,

        ]);
    }

    public function myBookings()
    {
        $bookings = Booking::where('user_id', auth()->id())
            ->with('payment')
            ->orderBy('booking_date', 'desc')
            ->orderBy('booking_time', 'desc')
            ->get();

        return view('booking.index', [
            'bookings' => $bookings,
        ]);
    }

    public function cancel($id)
    {
        $booking = Booking::where('id', $id)
            ->where('user_id', auth()->id())
            ->with('payment')
            ->firstOrFail();


        /*
        |--------------------------------------------------------------------------
        | Don't allow already cancelled bookings
        |--------------------------------------------------------------------------
        */

        if ($booking->status === 'cancelled') {

            return back()->withErrors([
                'booking' => 'This booking has already been cancelled.'
            ]);

        }


        /*
        |--------------------------------------------------------------------------
        | Create the appointment date and time
        |--------------------------------------------------------------------------
        */

        $appointmentDateTime = \Carbon\Carbon::createFromFormat(
            'Y-m-d H:i',
            $booking->booking_date->format('Y-m-d') . ' ' .
            $booking->booking_time->format('H:i')
        );


        /*
        |--------------------------------------------------------------------------
        | Check the 24-hour cancellation rule
        |--------------------------------------------------------------------------
        */

        if (
            now()->greaterThanOrEqualTo(
                $appointmentDateTime->copy()->subHours(24)
            )
        ) {

            return back()->withErrors([
                'booking' =>
                    'Cancellation unavailable. Your appointment is less than 24 hours away. Please contact the store.'
            ]);

        }


        /*
        |--------------------------------------------------------------------------
        | Cancel booking
        |--------------------------------------------------------------------------
        */

        $booking->update([
            'status' => 'cancelled',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Booking fee is retained
        |--------------------------------------------------------------------------
        */

        return back()->with(
            'success',
            'Your booking has been cancelled. Your ₦100 booking fee has been retained.'
        );
    }
}