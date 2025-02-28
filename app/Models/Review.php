<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        "property_id",
        "reviewer_id",
        "review_title",
        "review_contents",
        "rating"
    ];
}
