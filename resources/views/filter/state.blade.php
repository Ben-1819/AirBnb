@php
    use App\Models\Property;
@endphp
<x-app-layout>
    <div>
        <form action="{{route("filter.country")}}" method="get">
            @csrf
            <select name="state" id="filterBox" onchange="this.form.submit()">
                <option value="">Select State</option>
                @foreach($states as $state)
                <option value="{{$state}}" {{request("state") == $state ? "selected" : ""}}>
                    {{$state}}
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
