<!DOCTYPE html>
<x-app-layout>
    <div>
        <h1 class="text-2xl float justify-center">Your Properties</h1>
    </div>

    <div>
        <table class="border-2 border-solid border-red-500">
            <thead>
                <tr>
                    <th>PropertyId</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Reselect amenities</th>
                    <th>Remove amenities</th>
                </tr>
            </thead>
            <tbody>
                @if(count($users_properties) > 0)
                    @foreach($users_properties as $property)
                        <tr>
                            <td>{{$property->id}}</td>
                            <td>
                                <form action="{{route("property.show", $property->id)}}" method="get">
                                    @csrf
                                    <button class="border-2 border-solid border-red-500">Show</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{route("property.edit", $property->id)}}" method="get">
                                    @csrf
                                    <button class="border-2 border-solid border-red-500">Edit</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{route("property.destroy", $property->id)}}" method="post">
                                    @csrf
                                    @method("delete")
                                    <button class="border-2 border-solid border-red-500">Delete</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{route("amenity.destroyAll", $property->id)}}" method="post">
                                    @csrf
                                    @method("delete")
                                    <button class="border-2 border-solid border-red-500">Reselect Amenities</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{route("amenity.list", $property->id)}}" method="get">
                                    @csrf
                                    <button class="border-2 border-solid border-red-500">Delete Amenities</button>
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
