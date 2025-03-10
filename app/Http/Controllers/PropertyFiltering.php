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
    public function filterCity(Request $request){
        log::info("Get all unique cities from the locations table");
        $cities = Location::select("city")
            ->distinct()
            ->get()
            ->map(function($location){
                $location->city = trim($location->city);
                return $location->city;
            });

            log::info("Return all records from the Location table where the city matches the chosen one");
            $locations = Location::when($request->city, function($query) use($request){
                return $query->whereRaw("TRIM(city) = ?", [trim($request->city)]);
            })->get();


        return view("filter.city", compact("cities", "locations"));
    }

    public function filterCategory(Request $request){
        log::info("Get all unique main categories from the properties table");
        $mainCategories = Property::select("main_category")
            ->distinct()
            ->get()
            ->map(function($property){
                $property->main_category = trim($property->main_category);
                return $property->main_category;
            });

        log::info("Return all records from the property table where the main category matches the chosen one");
        $properties = Property::when($request->main_category, function($query) use($request){
            return $query->whereRaw("TRIM(main_category) = ?", [trim($request->main_category)]);
        })->get();

        return view("filter.category", compact("mainCategories", "properties"));
    }

}
