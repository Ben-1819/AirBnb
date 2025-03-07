<?php
use App\Models\Location;
$uniqueLocations = Location::select("state")->distinct()->get();
?>
<!DOCTYPE html>
    <x-app-layout>
        <div>
            <p>Filter by state</p>
            <form action="{{route("filter.showCountry")}}" method="get">
                @csrf
                <select id="filterBox" onchange="this.form.submit()">

                    @foreach($uniqueLocations as $location)
                    <option value={{$location->state}}>{{$location->state}}</option>
                    @endforeach
                </select>
            </form>
        </div>
        <div>
            <h1 class="text-2xl flex justify-center">All Properties</h1>
        </div>

        <div>
            <table class="border-2 border-solid border-red-500 justify-center ml-20 pt-20">
                <thead>
                    <tr>
                        <th>Property Id</th>
                        <th>Property Country</th>
                        <th>Property City</th>
                        <th>Max Guests</th>
                        <th>Bedrooms</th>
                        <th>Bathrooms</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($all_properties) > 0)
                        @foreach($all_properties as $property)
                            <tr>
                                <?php
                                $location = Location::where("property_id", $property->id)->first();
                                ?>
                                <td>{{$property->id}}</td>
                                <td>{{$location->state}}</td>
                                <td>{{$location->city}}</td>
                                <td>{{$property->max_guests}}</td>
                                <td>{{$property->number_of_bedrooms}}</td>
                                <td>{{$property->number_of_bathrooms}}</td>
                                <td>
                                    <form action="{{route("property.show", $property->id)}}" method="get">
                                        @csrf
                                        <button class="border-2 border-solid border-red-500">
                                            View
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">You have no properties</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </x-app-layout>
</html>
