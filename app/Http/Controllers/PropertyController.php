<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Models\Property;
use App\Models\User;
use App\Models\Review;
use App\Mail\PropertyUpdated;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        log::info("Create variable all properties");
        $all_properties = Property::all();
        log::info("Return view property index and pass in variable all_properties");
        return view("property.index", compact("all_properties"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        log::info("Return view property.create");
        return view("property.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertyRequest $request)
    {
        log::info("Retrieve validated input data");
        $request->validated();

        log::info("Insert a new record into the properties table");
        $property = new Property([
            "owner_id" => $request->user()->id,
            "location" => $request->location,
            "address" => $request->address,
            "main_category" => $request->main_category,
            "sub_category1" => $request->sub_category1,
            "sub_category2" => $request->sub_category2,
            "max_guests" => $request->max_guests,
            "number_of_bedrooms" => $request->number_of_bedrooms,
            "number_of_bathrooms" => $request->number_of_bathrooms,
            "description" => $request->description,
            "pets_allowed" => $request->pets_allowed == 'on' ? 1:0,
            "max_pets" => $request->max_pets,
            "price_per_pet" => $request->price_per_pet,
            "price_per_night" => $request->price_per_night
        ]);
        $property->save();
        log::info("New record saved in properties table");

        log::info("Owner ID: {owner_id}", ["owner_id" => $request->owner_id]);
        log::info("Location: {location}", ["location" => $request->location]);
        log::info("Address: {address}", ["address" => $request->address]);
        log::info("Main Category: {main_category}", ["main_category" => $request->main_category]);
        log::info("Sub Category 1: {sub_category1}", ["sub_category1" => $request->sub_category1]);
        log::info("Sub Category 2: {sub_category2}", ["sub_category2" => $request->sub_category2]);
        log::info("Max Guests: {max_guests}", ["max_guests" => $request->max_guests]);
        log::info("Number of Bedrooms: {number_of_bedrooms}", ["number_of_bedrooms" => $request->number_of_bedrooms]);
        log::info("Number of Bathrooms: {number_of_bathrooms}", ["number_of_bathrooms" => $request->number_of_bathrooms]);
        log::info("Description: {description}", ["description" => $request->description]);
        log::info("Pets allowed: {pets_allowed}", ["pets_allowed" => $request->pets_allowed]);
        log::info("Price per Pet: {{$request->price_per_pet}}");
        log::info("Price per Night: {price_per_night}", ["price_per_night" => $request->price_per_night]);

        log::info("Redirecting to the amenities selection view");
        //$property = Property::latest();
        //$propertyID = $property->id;

        return redirect()->route("amenity.add");
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property, $id)
    {
        log::info("Finding the property that has an ID that matches the parameters passed");
        $property = Property::find($id);
        log::info("Property found, returning to property.show and passing variable property as a parameter");
        return view("property.show", compact("property"));
    }

    public function usersProperties(){
        log::info("Get all properties that are owned by the user");
        $users_properties = Property::where("owner_id", request()->user()->id)->get();
        log::info("Returning to properties.owned and passing users_properties into the view");
        return view("property.owned", compact("users_properties"));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property, $id)
    {
        log::info("Finding the property that has an ID that matches the parameters passed");
        $property = Property::find($id);
        $user = request()->user();
        log::info("Stop the user from accessing the edit form if they are not the one who owns the property");
        /*if($property->owner_id !== request()->user()->id || $user->withoutRole('superadmin')){
            log::info("Returning error code 403");
            abort(403);
        }*/
        log::info("Property found, returning to property.edit and passing variable property as a parameter");
        return view("property.edit", compact("property"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePropertyRequest $request, Property $property)
    {
        log::info("Stop the user from updating the property if they are not the one who owns the property");
        $user = request()->user();
        if($property->owner_id == request()->user()->id){
            log::info("User updating the property is the property owner");
        }
        elseif($user->hasRole("superadmin")){
            log::info("User updating the property is a superadmin");
        }
        else{
            log::info("Return error code 403");
            abort(403);
        }

        log::info("Get the record from the property table where the property id matches");
        $oldProperty = Property::find($request->property_id);

        $request->validated();

        log::info("Update record in the properties table");
        $property = Property::where("id", $request->property_id)->update([
            "owner_id" => $request->owner_id,
            "location" => $request->location,
            "address" => $request->address,
            "main_category" => $request->main_category,
            "sub_category1" => $request->sub_category1,
            "sub_category2" => $request->sub_category2,
            "max_guests" => $request->max_guests,
            "number_of_bedrooms" => $request->number_of_bedrooms,
            "number_of_bathrooms" => $request->number_of_bathrooms,
            "description" => $request->description,
            "pets_allowed" => $request->pets_allowed == 'on' ? 1:0,
            "max_pets" => $request->max_pets,
            "price_per_pet" => $request->price_per_pet,
            "price_per_night" => $request->price_per_night
        ]);
        log::info("Record in properties table updated");

        log::info("Owner ID: {owner_id}", ["owner_id" => $request->owner_id]);
        log::info("Location: {location}", ["location" => $request->location]);
        log::info("Address: {address}", ["address" => $request->address]);
        log::info("Main Category: {main_category}", ["main_category" => $request->main_category]);
        log::info("Sub Category 1: {sub_category1}", ["sub_category1" => $request->sub_category1]);
        log::info("Sub Category 2: {sub_category2}", ["sub_category2" => $request->sub_category2]);
        log::info("Max Guests: {max_guests}", ["max_guests" => $request->max_guests]);
        log::info("Number of Bedrooms: {number_of_bedrooms}", ["number_of_bedrooms" => $request->number_of_bedrooms]);
        log::info("Number of Bathrooms: {number_of_bathrooms}", ["number_of_bathrooms" => $request->number_of_bathrooms]);
        log::info("Description: {description}", ["description" => $request->description]);
        log::info("Pets allowed: {pets_allowed}", ["pets_allowed" => $request->pets_allowed]);
        log::info("Price per Pet: {price_per_pet}", ["price_per_pet" => $request->price_per_pet]);
        log::info("Price per Night: {price_per_night}", ["price_per_night" => $request->price_per_night]);

        log::info("Create an array to send updated property information to property updated email");
        $newProperty = [
            "id" => $request->property_id,
            "owner_id" => $request->owner_id,
            "location" => $request->location,
            "address" => $request->address,
            "main_category" => $request->main_category,
            "sub_category1" => $request->sub_category1,
            "sub_category2" => $request->sub_category2,
            "max_guests" => $request->max_guests,
            "number_of_bedrooms" => $request->number_of_bedrooms,
            "number_of_bathrooms" => $request->number_of_bathrooms,
            "description" => $request->description,
            "pets_allowed" => $request->pets_allowed,
            "max_pets" => $request->max_pets,
            "price_per_pet" => $request->price_per_pet,
            "price_per_night" => $request->price_per_night
        ];

        log::info("Get the record from the users table where id matches the owner id");
        $owner = User::find($request->owner_id);

        log::info("Send an email to the owner of the property");
        Mail::to($owner->email)->send(new PropertyUpdated($newProperty, $oldProperty, $owner));

        log::info("Redirecting to the property.owned view");
        return redirect()->route("property.owned");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property, $id)
    {
        log::info("Stop user from deleting the property if they are not the owner of the property or a superadmin");
        log::info("Set property variable");
        $property::find($id);
        $user = request()->user();

        if($property->owner_id == $user()->id){
            log::info("User deleting the property is the owner of the property");
        }
        elseif($user()->hasRole("superadmin")){
            log::info("User deleting the property is a superadmin");
            log::info("ID of user deleting the property: ".$user->id);
        }
        else{
            log::info("User is not authorised to delete the property, return error code 403");
            abort(403);
        }

        log::info("Deleting property with id: {id}", ["id" => $id]);
        Property::where("id", $id)->delete();
        log::info("Property deleted, returning to the property index");
        return redirect()->route("property.index");
    }

    public function addReview(Request $request, $id){
        log::info("Validate the forms input fields");
        $request->validate([
            "review_id" => ["required", "integer"],
        ]);

        log::info("Get the record from the properties table with the same id as the one passed");
        $property = Property::find($id);

        log::info("Set total to 0");
        $total = 0;

        log::info("Get all reviews that have the same property id as the record retrievd from the properties table");
        $reviews = Review::where("property_id", $property->id)->get();

        log::info("Get the sum of the rating column for all records retrieved");
        $rating = Review::where("property_id", $property->id)->sum("rating");

        log::info("Create variable amount and count how many records were retrieved from the reviews table");
        $amount = count($reviews);

        log::info("Amount: {$amount}");
        log::info("Total rating: {$rating}");

        log::info("Loop through the reviews array and add the rating for each record to the total");
        foreach($reviews as $review){
            $total += $review->rating;
        }

        log::info("Get the average rating by dividing the total by the amount");
        $average = $total / $amount;

        log::info("Update the property to have the correct amount of reviews and the correct average rating");
        $update_property = Property::where("id", $id)->update([
            "number_of_reviews" => $amount,
            "avg_rating" => $average,
        ]);

        log::info("Return to the dashboard");
        return redirect()->route("dashboard");
    }
}
