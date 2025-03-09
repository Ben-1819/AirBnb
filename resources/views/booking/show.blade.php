<?php
use App\Models\User;
use App\Models\Property;
use App\Models\Location;
use Carbon\Carbon;
$customer = User::find($booking->customer_id);
$host = User::find($booking->host_id);
$booking_cost = ($booking->booking_cost);
$amount_of_nights = (Carbon::parse($booking->booking_start)->diffInDays(Carbon::parse($booking->booking_end)));
$property = Property::find($booking->property_id);
$cost_for_nights = strval(doubleval($amount_of_nights) * doubleval($property->price_per_night));
$location = Location::where("property_id", $property->id)->first();
?>

<x-app-layout>

    <div class="max-w-7xl mx-auto px-4">

        <div class="bg-white shadow-lg rounded-lg overflow-hidden border-2 border-solid border-red-500">

            <div class="p-6">
                <p class="text-grey-600 text-lg mt-2">Booking: {{$booking->id}}</p>

                <div class="mt-4 flex justify-between items-center">
                    <span class="text-2xl font-bold text-grey-900">Name on booking: {{$customer->first_name}} {{$customer->last_name}}</span>
                </div>

            </div>

            <div class="bg-grey-100 p-6 mt-4 border-2 border-solid border-red-500">
                <h2 class="text-2xl font-semibold text-grey-800 mb-4">Booking Details:</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div>
                        <h3 class="font-semibold text-grey-700">Property Location:</h3>
                        <p class="text-grey-600">{{$location->address}}, {{$location->postcode}}, {{$location->city}}, {{$location->state}}</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-grey-700">Booking Details:</h3>
                        <p class="text-grey-600">Amount of guests:{{$booking->amount_of_guests}}</p>
                        <p class="text-grey-600">Amount of pets: {{$booking->amount_of_pets}}</p>
                        <p class="text-grey-600">Amount of nights: {{$amount_of_nights}}</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-grey-700">Booking Dates:</h3>
                        <p class="text-grey-600">Booking start date:{{$booking->booking_start}}</p>
                        <p class="text-grey-600">Booking end date: {{$booking->booking_end}}</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-grey-700">Cost Breakdown Nights</h3>
                        <p class="text-grey-700">
                            Price per night: £{{$property->price_per_night}}
                            <br>
                            Amount of nights: {{$amount_of_nights}}
                            <br>
                            Cost for nights: £{{$cost_for_nights}}
                        </p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-grey-700">Cost Breakdown Pets</h3>
                        <p class="text-grey-700">
                            Price per pet: £{{$property->price_per_pet}}
                            <br>
                            Amount of pets: {{$booking->amount_of_pets}}
                            <br>
                            Cost for pets: £{{$booking->extra_charges}}
                        </p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-grey-700">Total Cost Breakdown</h3>
                        <p class="text-grey-700">
                            Cost for nights: £{{$cost_for_nights}}
                            <br>
                            Cost for pets: £{{$booking->extra_charges}}
                            <br>
                            Total Cost: £{{$booking_cost}}
                        </p>
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
                    <div>
                        <form action="{{route("review.create", $property)}}" method="get">
                            @csrf
                            <x-mybutton>
                                Review this property
                            </x-mybutton>
                        </form>
                    </div>
                    <div>
                        <form action="{{route("booking.edit", $booking->id)}}" method="get">
                            @csrf
                            <x-mybutton>
                                Edit this booking
                            </x-mybutton>
                        </form>
                    </div>
                    <div>
                        <form action="{{route("booking.destroy", $booking->id)}}" method="post">
                            @csrf
                            @method("delete")
                            <x-mybutton>
                                Delete Booking
                            </x-mybutton>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>
