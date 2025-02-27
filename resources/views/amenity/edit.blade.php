<!DOCTYPE html>
<x-app-layout>
    <div>
        <label>{{$property->id}}</label>
    </div>
    <div id="app">
        <edit-amenities :id='{{$property->id}}'></edit-amenities>
    </div>
</x-app-layout>
</html>
