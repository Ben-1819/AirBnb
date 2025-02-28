<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        log::info("Getting all records from the reviews table");
        $all_reviews = Review::all();
        log::info("Returning review.index and passing all_reviews");
        return view("review.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        log::info("Get record from the property table with the id: {$id}");
        $property = Property::find($id);
        log::info("Returning view review.create");
        return view("review.create", compact("property"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        log::info("Validating User Input");
        $request->validate([
            "review_title" => ["required", "string"],
            "review_contents" => ["required", "string"],
            "rating" => ["required", "integer"],
        ]);

        log::info("setting property variable");
        $property = Property::find($request->property_id);
        log::info("saving record into review table");
        $review = new Review([
            "property_id" => $property->id,
            "reviewer_id" => request()->user()->id,
            "review_title" => $request->review_title,
            "review_contents" => $request->review_contents,
            "rating" => $request->rating,
        ]);
        $review->save();
        log::info("Review saved");
        log::info("Property ID: {$review->property_id}");
        log::info("Reviewer ID: {$review->reviewer_id}");
        log::info("Review Title: {$review->review_title}");
        log::info("Review Contents: {$review->review_contents}");
        log::info("Rating: {$review->rating}");

        $url = route("property.addReview", ['id' => $property->id]);
        return redirect($url);
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
