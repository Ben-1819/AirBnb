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
            $amenityAdd = new PropertyAmenity([
                "property_id" => $property->id,
                "amenity_id" => $amenityID,
            ]);
            $amenityAdd->save();
            log::info("Amenity {$amenity->name} saved for property ID: {$property->id}");
        }

        return redirect()->route("property.index");
    }

    public function destroyAll($id){
        log::info("Get all records from the property_amenities table where property_id matches the passed id");
        $currentAmenities = PropertyAmenity::where("property_id", $id)->get();
        foreach($currentAmenities as $amenity){
            log::info("Current amenity being deleted: {$amenity->amenity_id}");
            PropertyAmenity::where("amenity_id", $amenity->amenity_id)->delete();
        }
        log::info("Call route amenity.edit and pass variable {$id}");
        $url = route("amenity.edit", ['id' => $id]);
        return redirect($url);
    }

    public function edit($id){
        $property = Property::find($id);
        $id = $property->id;
        return view("amenity.edit", compact("property"));
    }

    public function update(Request $request){
        $checkedAmenities = $request->input('checkedAmenities');
        $id = $request->input('id');
        intval($id);
        $property = Property::where("id", $id)->first();
        log::info("Do foreach loop on the values that you passed into the controller");
        foreach((array)$checkedAmenities as $amenity){
            log::info("Current amenity being added: " . $amenity);
            $amenityID = Amenity::where("name", $amenity)->value("id");
            $amenityAdd = new PropertyAmenity([
                "property_id" => $property->id,
                "amenity_id" => $amenityID,
            ]);
            $amenityAdd->save();
            log::info("Amenity {$amenity->name} saved for property ID: {$property->id}");
        }
        log::info("I reached line 78");
        return redirect()->route("property.index");
    }

    public function list($id){
        log::info("Get the record from the property table where id matches the passed id");
        $property = Property::find($id);
        log::info("Get all records form the PropertyAmenity table where property_id matches the id of the retrieved record from the property table");
        $amenities = PropertyAmenity::where("property_id", $property->id)->get();
        log::info("Return the amenity.remove view and pass the variables property and amenities");
        return view("amenity.remove", compact("property", "amenities"));

    }

    public function delete($id){
        log::info("Get the id of the property related to the amneity");
        $propertyAmenity = PropertyAmenity::where("amenity_id", $id);
        $property = Property::find($propertyAmenity->property_id);
        $propertyid = $property->id;
        log::info("Deleting the selected property");
        PropertyAmenity::where("amenity_id", $id)->where("property_id", $property->id)->delete;
        log::info("Call route amenity.list again to allow the user to perform multiple deletes");
        $url = route("amenity.list", ['id' => $id]);
        return redirect($url);
    }

}
