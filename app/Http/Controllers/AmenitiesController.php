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
    public function add(){
        //log::info("Pass the id of the property you are setting the amenities for into the add amenities view");
        log::info("Returning the amenity.add view");
        //$property = Property::where("id", $property->id);
        return view("amenity.add");
    }

    public function store(Request $request){
        $checkedAmenities = $request->input('checkedAmenities');
        log::info("Find most recently added property");
        $property = Property::latest()->first();
        log::info("Set property id to: {$property->id}");
        log::info("Create array to insert into the join table");
        $myAmenities = [];

        log::info("Do foreach loop on the values that you passed into the controller");
        foreach((array)$checkedAmenities as $amenity){
            log::info("Current amenity being added: " . $amenity);
            $amenityID = Amenity::where("name", $amenity)->value("id");
            $amenity = new PropertyAmenity([
                "property_id" => $property->id,
                "amenity_id" => $amenityID,
            ]);
            $amenity->save();
            log::info("Amenity '{$amenity}' saved for property ID: {$property->id}");
        }

        return redirect()->route("property.index");
    }
}
