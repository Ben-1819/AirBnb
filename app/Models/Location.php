<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        "property_id",
        "address",
        "city",
        "state",
        "postcode",
    ];
}
