<!DOCTYPE html>
<x-app-layout>
    <div>
        <h1 class="text-2xl">Edit Booking</h1>
    </div>
    <div>
        <form action="{{route("booking.update", $booking)}}" method="post">
            @csrf
            @method("put")
            <input type="hidden" name="host_id" value={{$booking->host_id}}>
            <input type="hidden" name="property_id" value={{$booking->property_id}}>
            <label for="amount_of_guests" class="text-xl">Number of guests: </label>
            <input type="number" id="amount_of_guests" name="amount_of_guests" class="border-2 border-solid border-red-500" value={{$booking->amount_of_guests}}>
            <br>
            <label for="amount_of_pets" class="text-xl">Number of pets: </label>
            <input type="number" id="amount_of_pets" name="amount_of_pets" class="border-2 border-solid border-red-500" value={{$booking->amount_of_pets}}>
            <br>
            <label for="booking_start" class="text-xl">Booking start date: </label>
            <input type="date" id="booking_start" name="booking_start" class="border-2 border-solid border-red-500" value={{$booking->booking_start}}>
            <br>
            <label for="booking_end" class="text-xl">Booking end date:</label>
            <input type="date" id="booking_end" name="booking_end" class="border-2 border-solid border-red-500" value={{$booking->booking_end}}>
        </form>
    </div>
</x-app-layout>
</html>
