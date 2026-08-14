<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalBookings = Booking::count();

        $pendingBookings = Booking::where(
            'status',
            'pending'
        )->count();

        $confirmedBookings = Booking::where(
            'status',
            'confirmed'
        )->count();

        $cancelledBookings = Booking::where(
            'status',
            'cancelled'
        )->count();

        $totalPayments = Payment::where(
            'status',
            'success'
        )->sum('amount');


        return view('admin.dashboard', [

            'totalBookings' => $totalBookings,

            'pendingBookings' => $pendingBookings,

            'confirmedBookings' => $confirmedBookings,

            'cancelledBookings' => $cancelledBookings,

            'totalPayments' => $totalPayments,

        ]);
    }

    public function bookings()
    {
        $bookings = Booking::with([
            'user',
            'payment'
        ])
        ->orderBy('booking_date', 'desc')
        ->orderBy('booking_time', 'desc')
        ->get();

        return view('admin.bookings', [
            'bookings' => $bookings,
        ]);
    }

    public function payments()
    {
        $payments = Payment::with([
            'user',
            'booking'
        ])
        ->latest()
        ->get();

        return view('admin.payments', [
            'payments' => $payments,
        ]);
    }
}