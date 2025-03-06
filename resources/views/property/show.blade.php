<?php
use App\Models\PropertyAmenity;
use App\Models\Amenity;
use App\Models\User;
use App\Models\Location;
?>
<!DOCTYPE html>
<x-app-layout>
    <div>
        <form action="{{route("booking.create", $property->id)}}" method="get">
            @csrf
            <button class="border-2 border-solid border-red-500 float justify-center float-right">Make a booking</button>
        </form>
        <table class="table-index">
            <thead>
                <tr>
                    <th>Property ID</th>
                    <th>Property Owner</th>
                    <th>Property Country</th>
                    <th>Amount of Reviews</th>
                    <th>Average Rating</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$property->id}}</td>
                    <?php
                    $owner = User::find($property->owner_id);
                    $location = Location::where("property_id", $property->id)->first();
                    ?>
                    <td>{{$owner->first_name}} {{$owner->last_name}}</td>
                    <td>{{$location->state}}</td>
                    <td>{{$property->number_of_reviews}}</td>
                    <td>{{$property->avg_rating}}</td>
                </tr>
            </tbody>
        </table>
    </div>
        <?php
        $amenities = PropertyAmenity::where("property_id", $property->id)->get();

        $amenity_ids = $amenities->pluck("amenity_id");

        $amenitiesBathroom = Amenity::whereIn("id", $amenity_ids)->where("group", "Bathroom")->get();
        $amenitiesLaundry = Amenity::whereIn("id", $amenity_ids)->where("group", "Laundry")->get();
        $amenitiesHeating = Amenity::whereIn("id", $amenity_ids)->where("group", "Heating")->get();
        $amenitiesSecurity = Amenity::whereIn("id", $amenity_ids)->where("group", "Security")->get();
        $amenitiesKitchen = Amenity::whereIn("id", $amenity_ids)->where("group", "Kitchen")->get();
        $amenitiesOutdoor = Amenity::whereIn("id", $amenity_ids)->where("group", "Outdoor")->get();
        $amenitiesView = Amenity::whereIn("id", $amenity_ids)->where("group", "View")->get();
        $amenitiesFacilities = Amenity::whereIn("id", $amenity_ids)->where("group", "Facilities")->get();
        $amenitiesFamily = Amenity::whereIn("id", $amenity_ids)->where("group", "Family")->get();
        $amenitiesServices = Amenity::whereIn("id", $amenity_ids)->where("group", "Services")->get();
        $amenitiesEntertainment = Amenity::whereIn("id", $amenity_ids)->where("group", "Entertainement")->get();
        $amenitiesInternet = Amenity::whereIn("id", $amenity_ids)->where("group", "Internet")->get();
        ?>
        <button type="button" id="bathroomButton" class="border-2 border-solid border-red-500 hover:bg-black hover:text-white">Bathroom</button>
        <div id="bathroom">
            <!--<h2 class="text-xl">Bathroom</h2>-->
            @if(count($amenitiesBathroom) > 0)
                @foreach($amenitiesBathroom as $amenityBathroom)
                    <label>{{$amenityBathroom->name}}, </label>
                @endforeach
            @else
                <label>No bathroom amenities</label>
            @endif
        </div>
        <button id="laundryButton" class="border-2 border-solid border-red-500 hover:bg-black hover:text-white">Laundry</button>
        <div id="laundry">
            @if(count($amenitiesLaundry) > 0)
                @foreach($amenitiesLaundry as $amenityLaundry)
                    <label>{{$amenityLaundry->name}}, </label>
                @endforeach
            @else
                <label>No laundry amenities</label>
            @endif
        </div>
        <!--<h2 class="text-xl">Laundry</h2>-->
        <button id="heatingButton" class="border-2 border-solid border-red-500 hover:bg-black hover:text-white">Heating</button>
        <div id="heating">
            @if(count($amenitiesHeating) > 0)
                @foreach($amenitiesHeating as $amenityHeating)
                    <label>{{$amenityHeating->name}}, </label>
                @endforeach
            @else
                <label>No Heating amenities</label>
            @endif
        </div>
        <!--<h2 class="text-xl">Heating</h2>-->

        <!--<h2 class="text-xl">Security</h2>-->
        <button id="securityButton" class="border-2 border-solid border-red-500 hover:bg-black hover:text-white">Security</button>
        <div id="security">
            @if(count($amenitiesSecurity) > 0)
                @foreach($amenitiesSecurity as $amenitySecurity)
                    <label>{{$amenitySecurity->name}}, </label>
                @endforeach
            @else
                <label>No Security amenities</label>
            @endif
        </div>

        <!--<h2 class="text-xl">Kitchen</h2>-->
        <button id="kitchenButton" class="border-2 border-solid border-red-500 hover:bg-black hover:text-white">Kitchen</button>
        <div id="kitchen">
            @if(count($amenitiesKitchen) > 0)
                @foreach($amenitiesKitchen as $amenityKitchen)
                    <label>{{$amenityKitchen->name}}, </label>
                @endforeach
            @else
                <label>No Kitchen amenities</label>
            @endif
        </div>

        <!--<h2 class="text-xl">Outdoor</h2>-->
        <button id="outdoorButton" class="border-2 border-solid border-red-500 hover:bg-black hover:text-white">Outdoor</button>
        <div id="outdoor">
            @if(count($amenitiesOutdoor) > 0)
                @foreach($amenitiesOutdoor as $amenityOutdoor)
                    <label>{{$amenityOutdoor->name}}, </label>
                @endforeach
            @else
                <label>No Outdoor amenities</label>
            @endif
        </div>

        <!--<h2 class="text-xl">Views</h2>-->
        <button id="viewButton" class="border-2 border-solid border-red-500 hover:bg-black hover:text-white">View</button>
        <div id="view">
            @if(count($amenitiesView) > 0)
                @foreach($amenitiesView as $amenityView)
                    <label>{{$amenityView->name}}, </label>
                @endforeach
            @else
                <label>No View amenities</label>
            @endif
        </div>

        <!--<h2 class="text-xl">Facilities</h2>-->
        <button id="facilitiesButton" class="border-2 border-solid border-red-500 hover:bg-black hover:text-white">Facilities</button>
        <div id="facilities">
            @if(count($amenitiesFacilities) > 0)
                @foreach($amenitiesFacilities as $amenityFacilities)
                    <label>{{$amenityFacilities->name}}, </label>
                @endforeach
            @else
                <label>No Facilities amenities</label>
            @endif
        </div>

        <!--<h2 class="text-xl">Family</h2>-->
        <button id="familyButton" class="border-2 border-solid border-red-500 hover:bg-black hover:text-white">Family</button>
        <div id="family">
            @if(count($amenitiesFamily) > 0)
                @foreach($amenitiesFamily as $amenityFamily)
                    <label>{{$amenityFamily->name}}, </label>
                @endforeach
            @else
                <label>No Family amenities</label>
            @endif
        </div>

        <!--<h2 class="text-xl">Services</h2>-->
        <button id="servicesButton" class="border-2 border-solid border-red-500 hover:bg-black hover:text-white">Services</button>
        <div id="services">
            @if(count($amenitiesServices) > 0)
                @foreach($amenitiesServices as $amenityServices)
                    <label>{{$amenityServices->name}}, </label>
                @endforeach
            @else
                <label>No Services amenities</label>
            @endif
        </div>

        <!--<h2 class="text-xl">Entertainment</h2>-->
        <button id="entertainmentButton" class="border-2 border-solid border-red-500 hover:bg-black hover:text-white">Entertainment</button>
        <div id="entertainment">
            @if(count($amenitiesEntertainment) > 0)
                @foreach($amenitiesEntertainment as $amenityEntertainment)
                    <label>{{$amenityEntertainment->name}}, </label>
                @endforeach
            @else
                <label>No Entertainment amenities</label>
            @endif
        </div>

        <!--<h2 class="text-xl">Internet</h2>-->
        <button id="internetButton" class="border-2 border-solid border-red-500 hover:bg-black hover:text-white">Internet</button>
        <div id="internet">
            @if(count($amenitiesInternet) > 0)
                @foreach($amenitiesInternet as $amenityInternet)
                    <label>{{$amenityInternet->name}}, </label>
                @endforeach
            @else
                <label>No Internet amenities</label>
            @endif
        </div>
    <div>

    </div>
</x-app-layout>
</html>
