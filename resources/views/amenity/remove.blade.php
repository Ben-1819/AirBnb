<?php
use App\Models\Amenity;
?>
<!DOCTYPE html>
<x-app-layout>
    <div>
        <h1 class="text-2xl flex justify-center">Delete Amenities</h1>
    </div>

    <div>
        <table class="border-2 border-solid border-red-500 justify-center ml-20 pt-20">
            <thead>
                <tr>
                    <th>Amenity ID</th>
                    <th>Amenity Name</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @if(count($amenities) > 0)
                    @foreach($amenities as $amenity)
                        <tr>
                            <td>{{$amenity->amenity_id}}</td>
                            <?php
                            $amenityName = Amenity::find($amenity->amenity_id);
                            ?>
                            <td>{{$amenityName->name}}</td>
                            <td>
                                <form action="{{route("amenity.destroy", $amenity->amenity_id)}}" method="post">
                                    @csrf
                                    @method("delete")
                                    <button class="border-2 border-solid border-red-500">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8">No Amenities on this property</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</x-app-layout>
</html>
