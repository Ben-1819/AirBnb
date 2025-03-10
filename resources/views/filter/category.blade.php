@php
    use App\Models\Location;
@endphp
<x-app-layout>
    <div>
        <form action="{{route("filter.category")}}" method="get">
            @csrf
            <select name="category" id="filterBox" onchange="this.form.submit()">
                <option value="">Select Category</option>
                @foreach($mainCategories as $main_category)
                <option value="{{$main_category}}" {{request("main_category") == $main_category ? "selected" : ""}}>
                    {{$main_category}}
                </option>
                @endforeach
            </select>
        </form>

    </div>
    <div class="property-container py-12">
        <div class="properties">
            @foreach($properties as $property)
                @php
                    $location = Location::where("property_id", $property->id)->first();
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
