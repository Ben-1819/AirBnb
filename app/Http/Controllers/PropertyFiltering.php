<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Location;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class PropertyFiltering extends Controller
{
    public function filterCountry(Request $request){
        /*log::info("Get all records from the locations table");
        $locations = Location::query()
            ->paginate();*/

        log::info("Get all unique states from the locations table");
        $states = Location::select("state")
            ->distinct()
            ->get()
            ->map(function($location){
                $location->state = trim($location->state);
                return $location->state;
            });

        log::info("Return all records from the Location table where the state matches the chosen one");
        $locations = Location::when($request->state, function($query) use($request){
            return $query->whereRaw("TRIM(state) = ?", [trim($request->state)]);
        })->get();

        log::info("Return the filter by country view");
        return view("filter.state", compact("states", "locations"));
    }
    public function filterByCountry(Request $request){
        log::info("Get all unique states from the locations table");
        $uniqueLocations = Location::select("state")
            ->distinct()
            ->pluck("state");




        return view("filter.state", compact("locations", "uniqueLocations"));
    }

}
