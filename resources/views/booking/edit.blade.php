<!DOCTYPE html>
<x-app-layout>

    <div class="container mt-5">
        <div class="row">
            <div class="col-xl-8 m-auto">
                <div class="card-shadow">
                    <div class="card-body">
                        <h1 class="text-2xl">Edit Booking</h1>
                        <form action="{{route("booking.update", $booking)}}" method="post">
                            @csrf
                            @method("put")
                            <input type="hidden" name="host_id" value={{$booking->host_id}}>
                            <input type="hidden" name="property_id" value={{$booking->property_id}}>
                            <input type="hidden" name="booking_id" value={{$booking->id}}>

                            <div class="row row-space mb-3">
                                <div class="col-6">
                                    <label for="amount_of_guests" class="text-xl">Number of guests: </label>
                                    <input type="number" id="amount_of_guests" name="amount_of_guests" class="border-2 border-solid border-red-500" value={{$booking->amount_of_guests}}>
                                    @error("amount_of_guests")
                                        <x-errors>{{ $message }}</x-errors>
                                    @enderror
                                </div>
                            </div>

                            <div class="row row-space mb-3">
                                <div class="col-6">
                                    <label for="amount_of_pets" class="text-xl">Number of pets: </label>
                                    <input type="number" id="amount_of_pets" name="amount_of_pets" class="border-2 border-solid border-red-500" value={{$booking->amount_of_pets}}>
                                    @error("amount_of_pets")
                                        <x-errors>{{ $message }}</x-errors>
                                    @enderror
                                </div>
                            </div>

                            <div class="row row-space mb-3">
                                <div class="col-6">
                                    <label for="booking_start" class="text-xl">Booking start date: </label>
                                    <input type="date" id="booking_start" name="booking_start" class="border-2 border-solid border-red-500" value={{$booking->booking_start}}>
                                    @error("booking_start")
                                        <x-errors>{{ $message }}</x-errors>
                                    @enderror
                                </div>
                            </div>

                            <div class="row row-space mb-3">
                                <div class="col-6">
                                    <label for="booking_end" class="text-xl">Booking end date:</label>
                                    <input type="date" id="booking_end" name="booking_end" class="border-2 border-solid border-red-500" value={{$booking->booking_end}}>
                                    @error("booking_end")
                                        <x-errors>{{ $message }}</x-errors>
                                    @enderror
                                </div>
                            </div>

                            <div class="pt-2 text-end">
                                <button class="border-2 border-solid border-red-500">Update Booking</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
</html>
