<x-app-layout>
    <div class="flex h-screen bg-gray-100">
        <div class="m-auto">
            <div class="mt-5 bg-white rounded-lg shadow">
                <div class="flex">
                    <div class="flex-1 py-5 pl-5 overflow-hidden">
                        <h1 class="inline text-2xl font-semibold leading-none">Make a booking for property: {{$property->id}}</h1>
                    </div>
                </div>
                <form action="{{route("booking.store", $property)}}" method="post">
                    @csrf

                    <div>
                        <input type="hidden" id="max_pets" value={{$property->max_pets}}>
                        <input type="hidden" id="max_guests" value={{$property->max_guests}}>
                        <input type="hidden" name="host_id" value={{$property->owner_id}}>
                        <input type="hidden" name="property_id" value={{$property->id}}>
                    </div>

                    <div class="px-5 pb-5">
                        <div class="flex">
                            <div class="flex-grow">
                                <label for="amount_of_guests" class="text-xl">Number of guests: </label>
                                <input type="number" id="amount_of_guests" name="amount_of_guests" value="{{old("amount_of_guests")}}" class="border-2 border-solid border-red-500" required>
                                @error("amount_of_guests")
                                    <x-errors>{{ $message }}</x-errors>
                                @enderror
                            </div>
                            <div class="flex-grow">
                                <label for="amount_of_pets" class="text-xl">Number of pets: </label>
                                <input type="number" id="amount_of_pets" name="amount_of_pets" value="{{old("amount_of_pets")}}" class="border-2 border-solid border-red-500" required>
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
                                <input type="date" id="booking_start" name="booking_start" value="{{old("booking_start")}}" class="border-2 border-solid border-red-500" required>
                                @error("booking_start")
                                    <x-errors>{{ $message }}</x-errors>
                                @enderror
                            </div>
                            <div class="flex-grow">
                                <label for="booking_end" class="text-xl">Booking end date:</label>
                                <input type="date" id="booking_end" name="booking_end" value="{{old("booking_end")}}" class="border-2 border-solid border-red-500" required>
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
                                    <button class="border-2 border-solid border-red-500">Create Booking</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
