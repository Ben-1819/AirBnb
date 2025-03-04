<!DOCTYPE html>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-xl-8 m-auto">
                <div class="card-shadow">
                    <div class="card-body">
                        <h1 class="text-2xl">Your booking has been updated!</h1>
                        <p>Hi {{$customer->first_name}}, your booking has been successfully updated, the new details are listed below:</p>
                        <div class="row row-space mb-3">
                            <div class="col-6">
                                <p>Property on booking: {{$booking["property_id"]}}</p>
                            </div>
                        </div>
                        <div class="row row-space mb-3">
                            <div class="col-6">
                                <p>Old amount of guests on booking: {{$oldBooking->amount_of_guests}}</p>
                                <p>New amount of guests on booking: {{$booking["amount_of_guests"]}}</p>
                            </div>
                        </div>
                        <div class="row row-space mb-3">
                            <div class="col-6">
                                <p>Old amount of pets on booking: {{$oldBooking->amount_of_pets}}</p>
                                <p>New amount of pets on booking: {{$booking["amount_of_pets"]}}</p>
                            </div>
                        </div>
                        <div class="row row-space mb-3">
                            <div class="col-6">
                                <p>Old extra charges on booking (pets): £{{$oldBooking->extra_charges}}</p>
                                <p>New extra charges on booking (pets): £{{$booking["extra_charges"]}}</p>
                            </div>
                        </div>
                        <div class="row row-space mb-3">
                            <div class="col-6">
                                <p>Old total cost on booking: £{{$oldBooking->booking_cost}}</p>
                                <p>New total cost on booking: £{{$booking["booking_cost"]}}</p>
                            </div>
                        </div>
                        <div class="row row-space mb-3">
                            <div class="col-6">
                                <p>Old booking start date: {{$oldBooking->booking_start}}</p>
                                <p>New booking start date: {{$booking["booking_start"]}}</p>
                            </div>
                        </div>
                        <div class="row row-space mb-3">
                            <div class="col-6">
                                <p>Old booking end date: {{$oldBooking->booking_end}}</p>
                                <p>New booking end date: {{$booking["booking_end"]}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
