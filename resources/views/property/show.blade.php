<?php
use App\Models\PropertyAmenity;
use App\Models\Amenity;
use App\Models\User;
?>
<!DOCTYPE html>
<x-app-layout>
    <div>
        <table class="table-index">
            <thead>
                <tr>
                    <th>Property ID</th>
                    <th>Property Owner</th>
                    <th>Property Location</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$property->id}}</td>
                    <?php
                    $owner = User::find($property->owner_id);
                    ?>
                    <td>{{$owner->first_name}} {{$owner->last_name}}</td>
                    <td>{{$property->location}}</td>
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
        <h2 class="text-xl">Bathroom</h2>
        @if(count($amenitiesBathroom) > 0)
            @foreach($amenitiesBathroom as $amenityBathroom)
                <p>{{$amenityBathroom->name}}</p>
            @endforeach
        @else
            <p>No bathroom amenities</p>
        @endif
        <h2 class="text-xl">Laundry</h2>
        @if(count($amenitiesLaundry) > 0)
            @foreach($amenitiesLaundry as $amenityLaundry)
                <p>{{$amenityLaundry->name}}</p>
            @endforeach
        @else
            <p>No laundry amenities</p>
        @endif
        <h2 class="text-xl">Heating</h2>
        @if(count($amenitiesHeating) > 0)
            @foreach($amenitiesHeating as $amenityHeating)
                <p>{{$amenityHeating->name}}</p>
            @endforeach
        @else
            <p>No Heating amenities</p>
        @endif
        <h2 class="text-xl">Security</h2>
        @if(count($amenitiesSecurity) > 0)
            @foreach($amenitiesSecurity as $amenitySecurity)
                <p>{{$amenitySecurity->name}}</p>
            @endforeach
        @else
            <p>No Security amenities</p>
        @endif
        <h2 class="text-xl">Kitchen</p>
        @if(count($amenitiesKitchen) > 0)
            @foreach($amenitiesKitchen as $amenityKitchen)
                <p>{{$amenityKitchen->name}}</p>
            @endforeach
        @else
            <p>No Kitchen amenities</p>
        @endif
        <h2 class="text-xl">Outdoor</p>
        @if(count($amenitiesOutdoor) > 0)
            @foreach($amenitiesOutdoor as $amenityOutdoor)
                <p>{{$amenityOutdoor->name}}</p>
            @endforeach
        @else
            <p>No Outdoor amenities</p>
        @endif
        <h2 class="text-xl">Views</p>
        @if(count($amenitiesView) > 0)
            @foreach($amenitiesView as $amenityView)
                <p>{{$amenityView->name}}</p>
            @endforeach
        @else
            <p>No View amenities</p>
        @endif
        <h2 class="text-xl">Facilities</p>
        @if(count($amenitiesFacilities) > 0)
            @foreach($amenitiesFacilities as $amenityFacilities)
                <p>{{$amenityFacilities->name}}</p>
            @endforeach
        @else
            <p>No Facilities amenities</p>
        @endif
        <h2 class="text-xl">Family</p>
        @if(count($amenitiesFamily) > 0)
            @foreach($amenitiesFamily as $amenityFamily)
                <p>{{$amenityFamily->name}}</p>
            @endforeach
        @else
            <p>No Family amenities</p>
        @endif
        <h2 class="text-xl">Services</h2>
        @if(count($amenitiesServices) > 0)
            @foreach($amenitiesServices as $amenityServices)
                <p>{{$amenityServices->name}}</p>
            @endforeach
        @else
            <p>No Services amenities</p>
        @endif
        <h2 class="text-xl">Entertainment</h2>
        @if(count($amenitiesEntertainment) > 0)
            @foreach($amenitiesEntertainment as $amenityEntertainment)
                <p>{{$amenityEntertainment->name}}</p>
            @endforeach
        @else
            <p>No Entertainment amenities</p>
        @endif
        <h2 class="text-xl">Internet</h2>
        @if(count($amenitiesInternet) > 0)
            @foreach($amenitiesInternet as $amenityInternet)
                <p>{{$amenityInternet->name}}</p>
            @endforeach
        @else
            <p>No Internet amenities</p>
        @endif
    <div>

    </div>
</x-app-layout>
</html>
