<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        "owner_id",
        "location",
        "address",
        "main_category",
        "sub_category1",
        "sub_category2",
        "max_guests",
        "number_of_bedrooms",
        "number_of_bathrooms",
        "description",
        "number_of_reviews",
        "avg_rating",
        "number_times_booked",
        "price_per_night"
    ];
}
