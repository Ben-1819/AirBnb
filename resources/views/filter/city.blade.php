@php
    use App\Models\Property;
@endphp
<x-app-layout>
    <div>
        <form action="{{route("filter.city")}}" method="get">
            @csrf
            <select name="city" id="filterBox" onchange="this.form.submit()">
                <option value="">Select city</option>
                @foreach($cities as $city)
                <option value="{{$city}}" {{request("city") == $city ? "selected" : ""}}>
                    {{$city}}
                </option>
                @endforeach
            </select>
        </form>

    </div>
    <div class="property-container py-12">
        <div class="properties">
            @foreach($locations as $location)
                @php
                    $property = Property::find($location->property_id);
                @endphp
                <div class="property-body">
                    <p>Property!</p>
                    <p>{{$location->city}}, {{$location->state}}</p>
                </div>
                <div class="property-button">
                    <a href="{{route("property.show", $property->id)}}" class="border-2 border-solid border-red-500">View</a>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
