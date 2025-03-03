<?php
use App\Models\User;
?>
<!DOCTYPE html>
<x-app-layout>
    <div>
        <h1 class="text-xl">All Bookings</h1>
    </div>
    <div>
        <table class="border-2 border-solid border-red-500">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Customer On Booking</th>
                    <th>Property On Booking</th>
                    <th>Owner Of Property</th>
                    <th>Booking Start Date</th>
                    <th>Booking End Date</th>
                    <th>Total Booking Cost</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                @if(count($all_bookings) > 0)
                    @foreach ($all_bookings as $booking)
                        <tr>
                            <td>{{$booking->id}}</td>
                            <?php
                            $customer = User::find($booking->customer_id);
                            ?>
                            <td>{{$customer->first_name}} {{$customer->last_name}}</td>
                            <td>{{$booking->property_id}}</td>
                            <?php
                            $owner = User::find($booking->host_id);
                            ?>
                            <td>{{$owner->first_name}} {{$owner->last_name}}</td>
                            <td>{{$booking->booking_start}}</td>
                            <td>{{$booking->booking_end}}</td>
                            <td>{{$booking->total_cost}}</td>
                            <td>
                                <form action="{{route("booking.show", $booking->id)}}" method="get">
                                    @csrf
                                    <button class="border-2 border-solid border-red-500">View</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8">No bookings</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</x-app-layout>
</html>
