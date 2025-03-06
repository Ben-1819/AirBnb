<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        "owner_id",
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
        "pets_allowed",
        "max_pets",
        "price_per_pet",
        "price_per_night"
    ];
}
