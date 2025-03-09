<?php
use App\Models\Location;
use App\Models\PropertyAmenity;
use App\Models\Amenity;
?>
<x-app-layout>
    <div class="max-w-7xl mx-auto px-4">
        <!-- Single Property Card -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden border-2 border-solid border-red-500">

            <!-- Property Information -->
            <div class="p-6">
                <p class="text-gray-600 text-lg mt-2">{{ $property->description }}</p>

                <div class="mt-4 flex justify-between items-center">
                    <span class="text-2xl font-bold text-gray-900">£{{ $property->price_per_night }}/night</span>
                </div>
            </div>

            <!-- Property Details -->
            <div class="bg-gray-100 p-6 mt-4 border-2 border-solid border-red-500">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Property Details</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div>
                        <?php
                            $location = Location::where("property_id", $property->id)->first();
                        ?>
                        <h3 class="font-semibold text-gray-700">Location:</h3>
                        <p class="text-gray-600">{{ $location->address }}, {{ $location->postcode }}, {{$location->city}}, {{$location->state}}</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-700">Bedrooms:</h3>
                        <p class="text-gray-600">{{ $property->number_of_bedrooms }}</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-700">Max Guests:</h3>
                        <p class="text-gray-600">{{ $property->max_guests }}</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-700">Max Pets:</h3>
                        <p class="text-gray-600">{{ $property->max_pets }}</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-700">Price Per Pet:</h3>
                        <p class="text-gray-600">£{{ $property->price_per_pet }}</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-700">Bathrooms:</h3>
                        <p class="text-gray-600">{{ $property->number_of_bathrooms }}</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-700">Amenities:</h3>
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
                        <div>
                            <!--<h2 class="text-xl">Bathroom</h2>-->
                            @if(count($amenitiesBathroom) > 0)
                            <div id="bathroom">
                                <ul class="list-disc pl-5">
                                @foreach($amenitiesBathroom as $amenityBathroom)
                                    <li>{{$amenityBathroom->name}}</li>
                                @endforeach
                                </ul>
                            </div>
                            @else
                                <label id="bathroom">No bathroom amenities</label>
                            @endif
                        </div>
                        <button id="laundryButton" class="border-2 border-solid border-red-500 hover:bg-black hover:text-white">Laundry</button>
                        <div>
                            @if(count($amenitiesLaundry) > 0)
                            <div id="laundry">
                                <ul class="list-disc pl-5">
                                @foreach($amenitiesLaundry as $amenityLaundry)
                                    <li>{{$amenityLaundry->name}}</li>
                                @endforeach
                                </ul>
                            </div>
                            @else
                                <label id="laundry">No laundry amenities</label>
                            @endif
                        </div>
                        <!--<h2 class="text-xl">Laundry</h2>-->
                        <button id="heatingButton" class="border-2 border-solid border-red-500 hover:bg-black hover:text-white">Heating</button>
                        <div>
                            @if(count($amenitiesHeating) > 0)
                            <div id="heating">
                                <ul class="list-disc pl-5">
                                @foreach($amenitiesHeating as $amenityHeating)
                                    <li>{{$amenityHeating->name}}</li>
                                @endforeach
                                </ul>
                            </div>
                            @else
                                <label id="heating">No Heating amenities</label>
                            @endif
                        </div>
                        <!--<h2 class="text-xl">Heating</h2>-->

                        <!--<h2 class="text-xl">Security</h2>-->
                        <button id="securityButton" class="border-2 border-solid border-red-500 hover:bg-black hover:text-white">Security</button>
                        <div>
                            @if(count($amenitiesSecurity) > 0)
                            <div id="security">
                                <ul class="list-disc pl-5">
                                @foreach($amenitiesSecurity as $amenitySecurity)
                                        <li>{{$amenitySecurity->name}}</li>
                                @endforeach
                                </ul>
                            </div>
                            @else
                                <label id="security">No Security amenities</label>
                            @endif
                        </div>

                        <!--<h2 class="text-xl">Kitchen</h2>-->
                        <button id="kitchenButton" class="border-2 border-solid border-red-500 hover:bg-black hover:text-white">Kitchen</button>
                        <div>
                            @if(count($amenitiesKitchen) > 0)
                            <div id="kitchen">
                                <ul class="list-disc pl-5">
                                @foreach($amenitiesKitchen as $amenityKitchen)
                                    <li>{{$amenityKitchen->name}}</li>
                                @endforeach
                                </ul>
                            </div>
                            @else
                                <label id="kitchen">No Kitchen amenities</label>
                            @endif
                        </div>

                        <!--<h2 class="text-xl">Outdoor</h2>-->
                        <button id="outdoorButton" class="border-2 border-solid border-red-500 hover:bg-black hover:text-white">Outdoor</button>
                        <div>
                            @if(count($amenitiesOutdoor) > 0)
                            <div id="outdoor">
                                <ul class="list-disc pl-5">
                                @foreach($amenitiesOutdoor as $amenityOutdoor)
                                    <li>{{$amenityOutdoor->name}}</li>
                                @endforeach
                                </ul>
                            </div>
                            @else
                                <label id="outdoor">No Outdoor amenities</label>
                            @endif
                        </div>

                        <!--<h2 class="text-xl">Views</h2>-->
                        <button id="viewButton" class="border-2 border-solid border-red-500 hover:bg-black hover:text-white">View</button>
                        <div>
                            @if(count($amenitiesView) > 0)
                            <div id="view">
                                <ul class="list-disc pl-5">
                                @foreach($amenitiesView as $amenityView)
                                    <li>{{$amenityView->name}}</li>
                                @endforeach
                                </ul>
                            </div>
                            @else
                                <label id="view">No View amenities</label>
                            @endif
                        </div>

                        <!--<h2 class="text-xl">Facilities</h2>-->
                        <button id="facilitiesButton" class="border-2 border-solid border-red-500 hover:bg-black hover:text-white">Facilities</button>
                        <div>
                            @if(count($amenitiesFacilities) > 0)
                            <div id="facilities">
                                <ul class="list-disc pl-5">
                                @foreach($amenitiesFacilities as $amenityFacilities)
                                    <li>{{$amenityFacilities->name}}</li>
                                @endforeach
                                </ul>
                            </div>
                            @else
                                <label id="facilities">No Facilities amenities</label>
                            @endif
                        </div>

                        <!--<h2 class="text-xl">Family</h2>-->
                        <button id="familyButton" class="border-2 border-solid border-red-500 hover:bg-black hover:text-white">Family</button>
                        <div>
                            @if(count($amenitiesFamily) > 0)
                            <div id="family">
                                <ul class="list-disc pl-5">
                                @foreach($amenitiesFamily as $amenityFamily)
                                    <li>{{$amenityFamily->name}}</li>
                                @endforeach
                                </ul>
                            </div>
                            @else
                                <label id="family">No Family amenities</label>
                            @endif
                        </div>

                        <!--<h2 class="text-xl">Services</h2>-->
                        <button id="servicesButton" class="border-2 border-solid border-red-500 hover:bg-black hover:text-white">Services</button>
                        <div>
                            @if(count($amenitiesServices) > 0)
                            <div id="services">
                                <ul class="list-disc pl-5">
                                @foreach($amenitiesServices as $amenityServices)
                                    <li>{{$amenityServices->name}}</li>
                                @endforeach
                                </ul>
                            </div>
                            @else
                                <label id="services">No Services amenities</label>
                            @endif
                        </div>

                        <!--<h2 class="text-xl">Entertainment</h2>-->
                        <button id="entertainmentButton" class="border-2 border-solid border-red-500 hover:bg-black hover:text-white">Entertainment</button>
                        <div>
                            @if(count($amenitiesEntertainment) > 0)
                            <div id="entertainment">
                                <ul class="list-disc pl-5">
                                @foreach($amenitiesEntertainment as $amenityEntertainment)
                                    <li>{{$amenityEntertainment->name}}</li>
                                @endforeach
                                </ul>
                            </div>
                            @else
                                <label id="entertainment">No Entertainment amenities</label>
                            @endif
                        </div>

                        <!--<h2 class="text-xl">Internet</h2>-->
                        <button id="internetButton" class="border-2 border-solid border-red-500 hover:bg-black hover:text-white">Internet</button>
                        <div>
                            @if(count($amenitiesInternet) > 0)
                            <div id="internet">
                                <ul class="list-disc pl-5">
                                @foreach($amenitiesInternet as $amenityInternet)
                                    <li>{{$amenityInternet->name}}</li>
                                @endforeach
                                </ul>
                            </div>
                            @else
                                <label id="internet">No Internet amenities</label>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Booking or Inquiry Section -->
            <div class="p-6 mt-4 bg-red-500 text-white text-center">
                <h3 class="text-xl font-semibold">Ready to book?</h3>
                <p class="text-sm">Click below to book your stay!</p>
                <form action="{{route("booking.create", $property->id)}}" method="get">
                    @csrf
                    <button class="border-2 border-solid border-red-500 float justify-center ">Make a booking</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
