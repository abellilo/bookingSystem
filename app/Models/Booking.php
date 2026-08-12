<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Payment;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'service',
        'booking_date',
        'booking_time',
        'service_price',
        'booking_fee',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}