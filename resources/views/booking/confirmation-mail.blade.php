<!DOCTYPE html>

<body>
    <div>
        <h1 class="text-xl text-center">Your booking has been confirmed!</h1>
    </div>

    <div>
        <h2 class="text-xl">Booking details</h2>
        <p>Booking id: {{$booking->id}}</p>
        <p>Property booked: {{$booking->property_id}}</p>
        <p>Property owners name: {{$owner->first_name}}</p>
        <p>Name on booking: {{$customer->first_name}} {{$customer->last_name}}</p>
        <p>Booking start date: {{$booking->booking_start}}</p>
        <p>Booking end date: {{$booking->booking_end}}</p>
        <p>Extra charges (pets): £{{$booking->extra_charges}}</p>
        <p>Total cost of booking: £{{$booking->booking_cost}}</p>
    </div>
</body>

</html>
