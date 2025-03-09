@php
    use App\Models\Location;
@endphp
<!DOCTYPE html>
    <x-app-layout>
        <div>
            <form action="{{route("filter.country")}}" method="get">
                @csrf
                <button class="border-2 border-solid border-red-500">Filter by state</button>
            </form>
            <form action="{{route("filter.city")}}" method="get">
                @csrf
                <button class="border-2 border-solid border-red-500">Filter by city</button>
            </form>
        </div>
        <div>
            <h1 class="text-2xl flex justify-center">All Properties</h1>
        </div>

        @if(count($all_properties) > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 place-items-center">
            <!-- Property Card -->
            @foreach($all_properties as $property)
            <?php
                $location = Location::where("property_id", $property->id)->first();
            ?>
            <div class="bg-white shadow-lg rounded-lg overflow-hidden border-2 border-solid border-red-500">
                <div class="p-4">
                    <h3 class="text-xl font-semibold text-gray-800">{{$property->main_category}}</h3>
                    <p class="text-gray-600 text-sm mt-2">{{$property->description}}</p>
                    <p class="text-grey-600 text-sm mt-2">{{$location->city}}</p>
                    <div class="flex justify-between items-center mt-4">
                        <span class="text-lg font-bold text-gray-900">{{$property->price_per_night}}</span>
                        <form action="{{route("property.show", $property->id)}}" method="get">
                            @csrf
                            <button>View property details</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div>
            <h1 class="text-2xl flex-justify-center">No Properties</h1>
        </div>
        @endif
    </x-app-layout>
</html>
