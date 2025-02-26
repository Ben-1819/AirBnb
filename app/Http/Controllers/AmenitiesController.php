<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amenity;
use App\Models\Property;
use App\Models\PropertyAmenity;
use DB;
use Illuminate\Support\Facades\Log;

class AmenitiesController extends Controller
{
    public function add(Property $property){
        //log::info("Pass the id of the property you are setting the amenities for into the add amenities view");
        log::info("Returning the amenity.add view");
        //$property = Property::where("id", $property->id);
        return view("amenity.add");
    }

    public function store(Request $request){
        log::info("Find most recently added property");
        $property = Property::latest();
        log::info("Set property id to: {id}", ["id" => $property->id]);
        $property_id = $property->id;
        log::info("Create array to insert into the join table");
        $myAmenities = array();

        log::info("Do foreach loop on the values that you passed into the controller");
        $selectedAmenities = $request->all();
        foreach($selectedAmenities as $amenity){
            $amenityID = Amenity::where("name", $amenity);
            DB::table("property_amenities")->insert([
                "property_id" => $property_id,
                "amenity_id" => $amenityID->id,
            ]);
            //array_push($myAmenities, ["property_id" => $property_id, "amenity_id" => $amenityID->id]);
        }

        //log::info("Save the array to your database table");
        //DB::table("property_amenities")->insert($myAmenities);
    }
}
