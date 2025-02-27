<?php
use App\Models\PropertyAmenity;
use App\Models\Amenity;
use App\Models\User;
?>
<!DOCTYPE html>
<x-app-layout>
    <div>
        <table class="table-index">
            <thead>
                <tr>
                    <th>Property ID</th>
                    <th>Property Owner</th>
                    <th>Property Location</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$property->id}}</td>
                    <?php
                    $owner = User::find($property->owner_id);
                    ?>
                    <td>{{$owner->first_name}}{{$owner->last_name}}</td>
                    <td>{{$property->location}}</td>
                </tr>
            </tbody>
        </table>
    </div>
        <?php
        $amenities = PropertyAmenity::where('property_id', $property->id)->get();  // Use `get()` to get a collection

        $amenity_ids = $amenities->pluck('amenity_id'); // Get the amenity ids from the PropertyAmenity model

        $amenitiesDetails = Amenity::whereIn('id', $amenity_ids)->get();  // Get all amenities matching the ids
        ?>
        @foreach($amenitiesDetails as $a)
            <p>{{$a->name}}</p>
        @endforeach
    <div>

    </div>
</x-app-layout>
</html>
