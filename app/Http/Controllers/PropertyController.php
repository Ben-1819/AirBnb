<?php

namespace App\Http\Controllers;

use App\Models\Property;
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
    public function store(Request $request)
    {
        $request->validate([
            "location" => ["required", "string"],
            "address" => ["required", "string"],
            "main_category" => ["required", "string"],
            "sub_category1" => ["required", "string"],
            "sub_category2" => ["required", "string"],
            "max_guests" => ["required", "integer"],
            "number_of_bedrooms" => ["required", "integer"],
            "number_of_bathrooms" => ["required", "integer"],
            "description" => ["required", "string"],
            "pets_allowed" => ["boolean"],
            "max_pets" => ["required", "integer"],
            "price_per_pet" => ["required", "string"],
            "price_per_night" => ["required", "string"]
        ]);

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
            "pets_allowed" => $request->pets_allowed,
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
        log::info("Price per Pet: {price_per_pet}". ["price_per_pet" => $request->price_per_pet]);
        log::info("Price per Night: {price_per_night}", ["price_per_night" => $request->price_per_night]);

        log::info("Redirecting to the amenities selection view");
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property, $id)
    {
        log::info("Finding the property that has an ID that matches the parameters passed");
        $property = Property::find($id);
        log::info("Stop the user from accessing the edit form if they are not the one who owns the property");
        if($property->owner_id !== request()->user()->id){
            log::info("Returning error code 403");
            abort(403);
        }
        log::info("Property found, returning to property.edit and passing variable property as a parameter");
        return view("property.edit", compact("property"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        log::info("Stop the user from updating the property if they are not the one who owns the property");
        if($property->owner_id !== request()->user()->id){
            log::info("Return error code 403");
            abort(403);
        }

        $request->validate([
            "location" => ["required", "string"],
            "address" => ["required", "string"],
            "main_category" => ["required", "string"],
            "sub_category1" => ["required", "string"],
            "sub_category2" => ["required", "string"],
            "max_guests" => ["required", "integer"],
            "number_of_bedrooms" => ["required", "integer"],
            "number_of_bathrooms" => ["required", "integer"],
            "description" => ["required", "string"],
            "pets_allowed" => ["boolean"],
            "max_pets" => ["required", "integer"],
            "price_per_pet" => ["required", "string"],
            "price_per_night" => ["required", "string"]
        ]);

        log::info("Update record in the properties table");
        $property = Property::where("id", $property->id)->update([
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
            "pets_allowed" => $request->pets_allowed,
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
        log::info("Price per Pet: {price_per_pet}". ["price_per_pet" => $request->price_per_pet]);
        log::info("Price per Night: {price_per_night}", ["price_per_night" => $request->price_per_night]);

        log::info("Redirecting to the amenities update choice view");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property, $id)
    {
        log::info("Stop user from deleting the property if they are not the owner of the property");
        log::info("Set property variable");
        $property::find($id);
        if($property->owner_id !== request()->user()->id){
            log::info("Return error code 403");
            abort(403);
        }
        log::info("Deleting property with id: {id}", ["id" => $id]);
        Property::where("id", $id)->delete();
        log::info("Property deleted, returning to the property index");
        return redirect()->route("property.index");
    }
}
