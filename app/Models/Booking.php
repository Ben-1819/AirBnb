<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        "host_id",
        "customer_id",
        "property_id",
        "amount_of_guests",
        "amount_of_pets",
        "extra_charges",
        "booking_cost",
        "booking_start",
        "booking_end"
    ];
}
