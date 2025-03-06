<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LocationController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        log::info("Return the store location view");
        return view("location.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        log::info("Get the most recently added property from the properties table");
        $property = Property::latest()->first();
        $values = [
            "property_id" => $property->id,
            "address" => $request->input("address"),
            "city" => $request->input("city"),
            "state" => $request->input("state"),
            "postcode" => $request->input("postcode"),
        ];
        log::info("Save properties location information");
        $location = new Location($values);
        $location->save();

        log::info("Property id: {id}", ["id", $values["property_id"]]);
        log::info("Property id: {address}", ["id", $values["address"]]);
        log::info("Property id: {city}", ["id", $values["city"]]);
        log::info("Property id: {state}", ["id", $values["state"]]);
        log::info("Property id: {postcode}", ["id", $values["postcode"]]);
        log::info("Redirect to amenity add view");
        return redirect()->route("amenity.add");
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        //
    }
}
