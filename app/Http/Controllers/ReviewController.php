<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Models\User;
use App\Models\Review;
use App\Models\Property;
use App\Notifications\ReviewCreatedNotification;
use App\Notifications\ReviewUpdatedNotification;
use Notification;
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
    public function store(StoreReviewRequest $request)
    {
        log::info("Validating User Input");
        $request->validated();

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

        log::info("Get owner of the property");
        $owner = User::find($property->owner_id);
        log::info("Send a notification to the owner of the property that a review has been left");
        Notification::send($owner, new ReviewCreatedNotification($property->id, request()->user(), $review));
        //Redirect to the review created view
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
    public function update(UpdateReviewRequest $request, Review $review)
    {
        log::info("Validate the users input");
        $request->validated();

        log::info("Get the id of the property being reviewed");
        $property = Property::find($request->property_id);

        log::info("Get review id");
        $review_idVar = $request->review_id;

        log::info("Create array for new review values");
        $newReview = [
            "property_id" => $request->property_id,
            "reviewer_id" => $request->reviewer_id,
            "review_title" => $request->review_title,
            "review_contents" => $request->review_contents,
            "rating" => $request->rating,
        ];

        log::info("Update the record in the reviews table");
        $update_review = Review::where("id", $request->review_id)->update($newReview);

        log::info("Add review id to array with new review data");
        $newReview["id"] = $review_idVar;

        log::info("Review updated successfully");
        log::info("Review id: {$newReview["id"]}");
        log::info("Property being reviewed: {$newReview["property_id"]}");
        log::info("Id of reviewer: {$newReview["reviewer_id"]}");
        log::info("Review title: {$newReview["review_title"]}");
        log::info("Review contents: {$newReview["review_contents"]}");
        log::info("Rating: {$newReview["rating"]}");

        log::info("Get owner of the property");
        $owner = User::find($property->owner_id);

        log::info("Send a notification to the owner of the property that a review has been left");
        Notification::send($owner, new ReviewUpdatedNotification($property->id, request()->user(), $newReview));

        //Redirect to the route that will automatically add the review onto the total reviews for the property
        //And calculate its average rating

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
