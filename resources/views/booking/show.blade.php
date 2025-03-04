<?php
use App\Models\User;
use App\Models\Property;
use Carbon\Carbon;
?>
<!DOCTYPE html>
<x-app-layout>
    <div>
        <h1 class="text-2xl">Booking: {{$booking->id}}</h1>
    </div>

    <div>
        <?php
        $customer = User::find($booking->customer_id);
        $host = User::find($booking->host_id);
        ?>
        <p>Customer on booking: {{$customer->first_name}} {{$customer->last_name}}</p>
        <p>Owner of property: {{$host->first_name}} {{$host->last_name}}</p>
        <?php
        $booking_cost = ($booking->booking_cost);
        $amount_of_nights = (Carbon::parse($booking->booking_start)->diffInDays(Carbon::parse($booking->booking_end)));
        $property = Property::where("id", $booking->property_id)->get();
        ?>
        <p>Booking Cost: £{{$booking_cost}}</p>
        <p>Amount of nights: {{$amount_of_nights}}</p>
    </div>

    <div>
        <form action="{{route("review.create", $property)}}" method="get">
            @csrf
            <button class="border-2 border-solid border-red-500">
                Review this property
            </button>
        </form>
    </div>

    <div>
        <form action="{{route("booking.edit", $booking->id)}}" method="get">
            @csrf
            <x-mybutton>Edit booking</x-mybutton>
        </form>
    </div>
</x-app-layout>
</html>
