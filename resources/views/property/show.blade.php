<?php
use App\Models\PropertyAmenity;
use App\Models\Amenity;
use App\Models\User;
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
                <label>{{$amenityBathroom->name}}, </label>
            @endforeach
        @else
            <label>No bathroom amenities</label>
        @endif
        <h2 class="text-xl">Laundry</h2>
        @if(count($amenitiesLaundry) > 0)
            @foreach($amenitiesLaundry as $amenityLaundry)
                <label>{{$amenityLaundry->name}}, </label>
            @endforeach
        @else
            <label>No laundry amenities</label>
        @endif
        <h2 class="text-xl">Heating</h2>
        @if(count($amenitiesHeating) > 0)
            @foreach($amenitiesHeating as $amenityHeating)
                <label>{{$amenityHeating->name}}, </label>
            @endforeach
        @else
            <label>No Heating amenities</label>
        @endif
        <h2 class="text-xl">Security</h2>
        @if(count($amenitiesSecurity) > 0)
            @foreach($amenitiesSecurity as $amenitySecurity)
                <label>{{$amenitySecurity->name}}, </label>
            @endforeach
        @else
            <label>No Security amenities</label>
        @endif
        <h2 class="text-xl">Kitchen</h2>
        @if(count($amenitiesKitchen) > 0)
            @foreach($amenitiesKitchen as $amenityKitchen)
                <label>{{$amenityKitchen->name}}, </label>
            @endforeach
        @else
            <label>No Kitchen amenities</label>
        @endif
        <h2 class="text-xl">Outdoor</h2>
        @if(count($amenitiesOutdoor) > 0)
            @foreach($amenitiesOutdoor as $amenityOutdoor)
                <label>{{$amenityOutdoor->name}}, </label>
            @endforeach
        @else
            <label>No Outdoor amenities</label>
        @endif
        <h2 class="text-xl">Views</h2>
        @if(count($amenitiesView) > 0)
            @foreach($amenitiesView as $amenityView)
                <label>{{$amenityView->name}}, </label>
            @endforeach
        @else
            <label>No View amenities</label>
        @endif
        <h2 class="text-xl">Facilities</h2>
        @if(count($amenitiesFacilities) > 0)
            @foreach($amenitiesFacilities as $amenityFacilities)
                <label>{{$amenityFacilities->name}}, </label>
            @endforeach
        @else
            <label>No Facilities amenities</label>
        @endif
        <h2 class="text-xl">Family</h2>
        @if(count($amenitiesFamily) > 0)
            @foreach($amenitiesFamily as $amenityFamily)
                <label>{{$amenityFamily->name}}, </label>
            @endforeach
        @else
            <label>No Family amenities</label>
        @endif
        <h2 class="text-xl">Services</h2>
        @if(count($amenitiesServices) > 0)
            @foreach($amenitiesServices as $amenityServices)
                <label>{{$amenityServices->name}}, </label>
            @endforeach
        @else
            <label>No Services amenities</label>
        @endif
        <h2 class="text-xl">Entertainment</h2>
        @if(count($amenitiesEntertainment) > 0)
            @foreach($amenitiesEntertainment as $amenityEntertainment)
                <label>{{$amenityEntertainment->name}}, </label>
            @endforeach
        @else
            <label>No Entertainment amenities</label>
        @endif
        <h2 class="text-xl">Internet</h2>
        @if(count($amenitiesInternet) > 0)
            @foreach($amenitiesInternet as $amenityInternet)
                <label>{{$amenityInternet->name}}, </label>
            @endforeach
        @else
            <label>No Internet amenities</label>
        @endif
    <div>

    </div>
</x-app-layout>
</html>
