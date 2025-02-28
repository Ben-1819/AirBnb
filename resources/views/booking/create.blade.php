<?php
use App\Models\User;
?>
<!DOCTYPE html>
<x-app-layout>
    <div>
        <h1 class="text-xl flex justify-center">Make a booking for property: {{$property->id}}</h1>
    </div>
    <form action="{{route("booking.store", $property)}}" method="post">
        @csrf
        <div>
            <input type="hidden" name="host_id" value={{$property->owner_id}}>
            <input type="hidden" name="property_id" value={{$property->id}}>
            <label for="amount_of_guests" class="text-xl">Number of guests: </label>
            <input type="number" id="amount_of_guests" name="amount_of_guests" class="border-2 border-solid border-red-500">
            <br>
            <label for="amount_of_pets" class="text-xl">Number of pets: </label>
            <input type="number" id="amount_of_pets" name="amount_of_pets" class="border-2 border-solid border-red-500">
            <br>
            <label for="booking_start" class="text-xl">Booking start date: </label>
            <input type="date" id="booking_start" name="booking_start" class="border-2 border-solid border-red-500">
            <br>
            <label for="booking_end" class="text-xl">Booking end date:</label>
            <input type="date" id="booking_end" name="booking_end" class="border-2 border-solid border-red-500">
        </div>
        <button class="border-2 border-solid border-red-500">Create Booking</button>
    </form>


</x-app-layout>
</html>
