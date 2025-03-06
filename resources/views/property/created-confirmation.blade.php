<?php
use App\Models\Amenity;
use App\Models\PropertyAmenity;
use App\Models\Location;
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite('resources/css/app.css')
        <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    </head>
    <body class="font-sans antialiased" >
        <div class="min-h-screen bg-white">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-xl-8 m-auto">
                        <h1 class="text-2xl">Property created successfully!</h1>
                        <p>{{$owner->first_name}}, your property has been created</p>
                        <p>The details are as follows:</p>
                        <h3>Property details:</h3>
                        <?php
                        $location = Location::where("property_id",$property->id)->get();
                        ?>
                        <div class="row row-space mb-3">
                            <div class="col-6">
                                <p>Property address: {{$location->address}}</p>
                                <p>Property city: {{$location->city}}</p>
                                <p>Property state: {{$location->state}}</p>
                                <p>Property postcode: {{$location->postcode}}</p>
                            </div>
                        </div>
                        <div class="row row-space mb-3">
                            <div class="col-6">
                                <p>Main category: {{$property->main_category}}</p>
                                <p>Sub category 1: {{$property->sub_category1}}</p>
                                <p>Sub category 2: {{$property->sub_category2}}</p>
                            </div>
                        </div>
                        <div class="row row-space mb-3">
                            <div class="col-6">
                                <p>Max guests: {{$property->max_guests}}</p>
                                @php
                                    if($property->pets_allowed == true){
                                        $pets = 1;
                                    }
                                    else{
                                        $pets = 0;
                                    }
                                @endphp
                                @if($pets = 1)
                                    <p>Pets allowed: Yes</p>
                                @else
                                    <p>Pets allowed: No</p>
                                @endif
                                <p>Max pets: {{$property->max_pets}}</p>
                            </div>
                        </div>
                        <div class="row row-space mb-3">
                            <div class="col-6">
                                <p>Number of bedrooms: {{$property->number_of_bedrooms}}</p>
                                <p>Number of bathrooms: {{$property->number_of_bathrooms}}</p>
                            </div>
                        </div>
                        <div class="row row-space mb-3">
                            <div class="col-6">
                                <p>Description: {{$property->description}}</p>
                                <p>Charge per pet: {{$property->price_per_pet}}</p>
                                <p>Price per night: {{$property->price_per_night}}</p>
                            </div>
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
                        <div class="row row-space mb-3">
                            <div class="col-6">
                                <h4>Bathroom amenities:</h4>
                                @if(count($amenitiesBathroom) > 0)
                                    <ul>
                                        @foreach($amenitiesBathroom as $amenityBathroom)
                                            <li>{{$amenityBathroom->name}}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <label>No bathroom amenities</label>
                                @endif
                            </div>
                        </div>
                        <div class="row row-space mb-3">
                            <div class="col-6">
                                <h4>Laundry Amenities:</h4>
                                @if(count($amenitiesLaundry) > 0)
                                    <ul>
                                        @foreach($amenitiesLaundry as $amenityLaundry)
                                            <li>{{$amenityLaundry->name}}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <label>No laundry amenities</label>
                                @endif
                            </div>
                        </div>
                        <div class="row row-space mb-3">
                            <div class="col-6">
                                <h4>Heating Amenities:</h4>
                                @if(count($amenitiesHeating) > 0)
                                    <ul>
                                        @foreach($amenitiesHeating as $amenityHeating)
                                            <li>{{$amenityHeating->name}}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <label>No Heating amenities</label>
                                @endif
                            </div>
                        </div>
                        <div class="row row-space mb-3">
                            <div class="col-6">
                                <h4>Security Amenities:</h4>
                                @if(count($amenitiesSecurity) > 0)
                                    <ul>
                                        @foreach($amenitiesSecurity as $amenitySecurity)
                                            <li>{{$amenitySecurity->name}}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <label>No Security amenities</label>
                                @endif
                            </div>
                        </div>
                        <div class="row row-space mb-3">
                            <div class="col-6">
                                <h4>Kitchen Amenities:</h4>
                                @if(count($amenitiesKitchen) > 0)
                                    <ul>
                                        @foreach($amenitiesKitchen as $amenityKitchen)
                                            <label>{{$amenityKitchen->name}}</label>
                                        @endforeach
                                    </ul>
                                @else
                                    <label>No Kitchen amenities</label>
                                @endif
                            </div>
                        </div>
                        <div class="row row-space mb-3">
                            <div class="col-6">
                                <h4>Outdoor Amenities:</h4>
                                @if(count($amenitiesOutdoor) > 0)
                                    <ul>
                                        @foreach($amenitiesOutdoor as $amenityOutdoor)
                                            <li>{{$amenityOutdoor->name}}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <label>No Outdoor amenities</label>
                                @endif
                            </div>
                        </div>
                        <div class="row row-space mb-3">
                            <div class="col-6">
                                <h4>View Amenities:</h4>
                                @if(count($amenitiesView) > 0)
                                    <ul>
                                        @foreach($amenitiesView as $amenityView)
                                            <li>{{$amenityView->name}}</li>
                                        @endforeach
                                    </ul>

                                @else
                                    <label>No View amenities</label>
                                @endif
                            </div>
                        </div>
                        <div class="row row-space mb-3">
                            <div class="col-6">
                                <h4>Facilities Amenities:</h4>
                                @if(count($amenitiesFacilities) > 0)
                                    <ul>
                                        @foreach($amenitiesFacilities as $amenityFacilities)
                                            <li>{{$amenityFacilities->name}}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <label>No Facilities amenities</label>
                                @endif
                            </div>
                        </div>
                        <div class="row row-space mb-3">
                            <div class="col-6">
                                <h4>Family Amenities:</h4>
                                @if(count($amenitiesFamily) > 0)
                                    <ul>
                                        @foreach($amenitiesFamily as $amenityFamily)
                                            <li>{{$amenityFamily->name}}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <label>No Family amenities</label>
                                @endif
                            </div>
                        </div>
                        <div class="row row-space mb-3">
                            <div class="col-6">
                                <h4>Services Amenities:</h4>
                                @if(count($amenitiesServices) > 0)
                                    <ul>
                                        @foreach($amenitiesServices as $amenityServices)
                                            <li>{{$amenityServices->name}}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <label>No Services amenities</label>
                                @endif
                            </div>
                        </div>
                        <div class="row row-space mb-3">
                            <div class="col-6">
                                <h4>Entertainement Amenities:</h4>
                                @if(count($amenitiesEntertainment) > 0)
                                    <ul>
                                        @foreach($amenitiesEntertainment as $amenityEntertainment)
                                            <li>{{$amenityEntertainment->name}}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <label>No Entertainment amenities</label>
                                @endif
                            </div>
                        </div>
                        <div class="row row-space mb-3">
                            <div class="col-6">
                                <h4>Internet Amenities:</h4>
                                @if(count($amenitiesInternet) > 0)
                                    <ul>
                                        @foreach($amenitiesInternet as $amenityInternet)
                                            <li>{{$amenityInternet->name}}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <label>No Internet amenities</label>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
