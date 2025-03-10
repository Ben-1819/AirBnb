<x-app-layout>
    <div class="flex h-screen bg-gray-100">
        <div class="m-auto">
            <div class="mt-5 bg-white rounded-lg shadow">
                <div class="flex">
                    <div class="flex-1 py-5 pl-5 overflow-hidden">
                        <h1 class="inline text-2xl font-semibold leading-none">Edit Booking: {{$booking->id}}</h1>
                    </div>
                </div>
                <form action="{{route("booking.update", $booking)}}" method="post">
                    @csrf
                    @method("put")
                    <div>
                        <input type="hidden" name="host_id" value={{$booking->host_id}}>
                        <input type="hidden" name="customer_id" value={{$booking->customer_id}}>
                        <input type="hidden" name="property_id" value={{$booking->property_id}}>
                        <input type="hidden" name="booking_id" value={{$booking->id}}>
                    </div>

                    <div class="px-5 pb-5">
                        <div class="flex">
                            <div class="flex-grow">
                                <label for="amount_of_guests" class="text-xl">Number of guests: </label>
                                <input type="number" id="amount_of_guests" name="amount_of_guests" class="border-2 border-solid border-red-500" value={{$booking->amount_of_guests}}>
                                @error("amount_of_guests")
                                    <x-errors>{{ $message }}</x-errors>
                                @enderror
                            </div>
                            <div class="flex-grow">
                                <label for="amount_of_pets" class="text-xl">Number of pets: </label>
                                <input type="number" id="amount_of_pets" name="amount_of_pets" class="border-2 border-solid border-red-500" value={{$booking->amount_of_pets}}>
                                @error("amount_of_pets")
                                    <x-errors>{{ $message }}</x-errors>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr class="mt-3 mb-3">
                    <div class="px-5 pb-5">
                        <div class="flex">
                            <div class="flex-grow">
                                <label for="booking_start" class="text-xl">Booking start date: </label>
                                <input type="date" id="booking_start" name="booking_start" class="border-2 border-solid border-red-500" value={{$booking->booking_start}}>
                                @error("booking_start")
                                    <x-errors>{{ $message }}</x-errors>
                                @enderror
                            </div>
                            <div class="flex-grow">
                                <label for="booking_end" class="text-xl">Booking end date:</label>
                                <input type="date" id="booking_end" name="booking_end" class="border-2 border-solid border-red-500" value={{$booking->booking_end}}>
                                @error("booking_end")
                                    <x-errors>{{ $message }}</x-errors>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr class="mt-3 mb-3">
                    <div class="px-5 pb-5">
                        <div class="flex">
                            <div class="flex-grow">
                                <div class="pt-5 flex items-center justify-center">
                                    <button class="border-2 border-solid border-red-500">Update Booking</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
