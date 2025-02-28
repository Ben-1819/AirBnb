<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use phpDocumentor\Reflection\DocBlock\Tags\Factory\PropertyFactory;

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
        return view("review.index", compact("all_reviews"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Property $property)
    {
        log::info("Get record from the property table with the id: {$property->id}");
        $property = Property::find($property->id);
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
            "property_id" => ["required", "integer"],
            "review_title" => ["required", "string"],
            "review_contents" => ["required", "string"],
            "rating" => ["required", "integer", "min:1", "max:5"],
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

        //Redirect to the review created virw
        return view("review.created", compact("property", "review"));
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review, $id)
    {
        log::info("Retrieve the record in the review table that has an id matching the id passed");
        $review = Review::find($id);
        log::info("Record retrieved");
        return view("review.show", compact("review"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review, $id)
    {
        log::info("Retrieve the record in the review table that has an id matching the id passed");
        $review = Review::find($id);
        log::info("Record retrieved");
        return view("review.edit", compact("review"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        log::info("Validate the users input");
        $request->validate([
            "review_title" => ["required", "string"],
            "review_contents" => ["required", "string"],
            "rating" => ["required", "integer", "min:1", "max:5"],
        ]);

        log::info("Update the record in the reviews table");
        $update_review = Review::where("id", $review->id)->update([
            "property_id" => $review->property_id,
            "reviewer_id" => $review->reviewer_id,
            "review_title" => $request->review_title,
            "review_contents" => $request->review_contents,
            "rating" => $request->rating,
        ]);

        log::info("Review updated successfully");
        log::info("Review id: {$review->id}");
        log::info("Property being reviewed: {$review->property_id}");
        log::info("Id of reviewer: {$review->reviewer_id}");
        log::info("Review title: {$review->review_title}");
        log::info("Review contents: {$review->review_contents}");
        log::info("Rating: {$review->rating}");

        //Redirect to the route that will automatically add the review onto the total reviews for the property
        //And calculate its average rating
        $property = Property::find($review->property_id);
        return view("review.created", compact("property", "review"));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //Prevent users from deleting reviews if they are not the superadmin or the creator of the review
        if($review->reviewer_id == request()->user()->id){

        }
        elseif(request()->user()->hasRole("superadmin")){

        }
        else{
            log::info("User trying to delete the review was not the creater of the review or the superadmin");
            abort(403);
        }
        log::info("Delete the record specified from the reviews table");
        Review::delete();
        log::info("Return the user to the dashboard");
        return redirect()->route("dashboard");

    }
}
