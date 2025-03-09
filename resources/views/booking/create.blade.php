<?php
use App\Models\User;
?>
<!DOCTYPE html>
<x-app-layout>
    <input type="hidden" id="max_pets" value={{$property->max_pets}}>
    <input type="hidden" id="max_guests" value={{$property->max_guests}}>
    <div class="container mt-5">
        <div class="row">
            <div class="col-xl-8 m-auto">
                <div class="card-shadow">
                    <div class="card-body">
                        <h1 class="text-xl flex justify-center">Make a booking for property: {{$property->id}}</h1>
                        <form action="{{route("booking.store", $property)}}" method="post">
                            @csrf
                            <input type="hidden" name="host_id" value={{$property->owner_id}}>
                            <input type="hidden" name="property_id" value={{$property->id}}>
                            <div class="row row-space mb-3">
                                <div class="col-6">
                                    <label for="amount_of_guests" class="text-xl">Number of guests: </label>
                                    <input type="number" id="amount_of_guests" name="amount_of_guests" value="{{old("amount_of_guests")}}" class="border-2 border-solid border-red-500" required>
                                    @error("amount_of_guests")
                                        <x-errors>{{ $message }}</x-errors>
                                    @enderror
                                </div>
                            </div>

                            <div class="row row-space mb-3">
                                <div class="col-6">
                                    <label for="amount_of_pets" class="text-xl">Number of pets: </label>
                                    <input type="number" id="amount_of_pets" name="amount_of_pets" value="{{old("amount_of_pets")}}" class="border-2 border-solid border-red-500" required>
                                    @error("amount_of_pets")
                                        <x-errors>{{ $message }}</x-errors>
                                    @enderror
                                </div>
                            </div>

                            <div class="row row-space mb-3">
                                <div class="col-6">
                                    <label for="booking_start" class="text-xl">Booking start date: </label>
                                    <input type="date" id="booking_start" name="booking_start" value="{{old("booking_start")}}" class="border-2 border-solid border-red-500" required>
                                    @error("booking_start")
                                        <x-errors>{{ $message }}</x-errors>
                                    @enderror
                                </div>
                            </div>

                            <div class="row row-space mb-3">
                                <div class="col-6">
                                    <label for="booking_end" class="text-xl">Booking end date:</label>
                                    <input type="date" id="booking_end" name="booking_end" value="{{old("booking_end")}}" class="border-2 border-solid border-red-500" required>
                                    @error("booking_end")
                                        <x-errors>{{ $message }}</x-errors>
                                    @enderror
                                </div>
                            </div>

                            <div class="pt-2 text-end">
                                <button class="border-2 border-solid border-red-500">Create Booking</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>
</html>
