<!DOCTYPE html>

<div>
    <h1 class="text-2xl">Property updated successfully!</h1>
    <p>{{$owner->first_name}}, your property has been updated</p>
    <div>
        <p>Property id: {{$property["id"]}}</p>

        <div>
            <p>Old property location: {{$oldProperty->location}}</p>
            <p>New property location: {{$property["location"]}}</p>
            <p>Old property address: {{$oldProperty->address}}</p>
            <p>New property address: {{$property["address"]}}</p>
            <p>Old main category: {{$oldProperty->main_category}}</p>
            <p>New main category: {{$property["main_category"]}}</p>
            <p>Old sub category 1: {{$oldProperty->sub_category1}}</p>
            <p>New sub category 1: {{$property["sub_category1"]}}</p>
            <p>Old sub category 2: {{$oldProperty->sub_category2}}</p>
            <p>New sub category 2: {{$property["sub_category2"]}}</p>
            <p>Old max guests: {{$oldProperty->max_guests}}</p>
            <p>New max guests: {{$property["max_guests"]}}</p>
            @php
                if($oldProperty->pets_allowed == false){
                    $oldPets = 1;
                }
                else{
                    $oldPets = 0;
                }
            @endphp
            @php
                if($property["pets_allowed"] == false){
                    $pets = 1;
                }
                else{
                    $pets = 0;
                }
            @endphp
            @if($oldPets = 1)
                <p>Old pets allowed: Yes</p>
            @else
                <p>Old pets allowed: No</p>
            @endif
            @if($pets = 1)
                <p>New pets allowed: Yes</p>
            @else
                <p>New pets allowed: No</p>
            @endif
            <p>Old max pets: {{$oldProperty->max_pets}}</p>
            <p>New max pets: {{$property["max_pets"]}}</p>

            <p>Old number of bedrooms: {{$oldProperty->number_of_bedrooms}}</p>
            <p>New number of bedrooms: {{$property["number_of_bedrooms"]}}</p>

            <p>Old number of bathrooms: {{$oldProperty->number_of_bathrooms}}</p>
            <p>New number of bathrooms: {{$property["number_of_bathrooms"]}}</p>

            <p>Old description: {{$oldProperty->description}}</p>
            <p>New description: {{$property["description"]}}</p>

            <p>Old charge per pet: {{$oldProperty->price_per_pet}}</p>
            <p>New charge per pet: {{$property["price_per_pet"]}}</p>

            <p>Old price per night: {{$oldProperty->price_per_night}}</p>
            <p>New price per night: {{$property["price_per_night"]}}</p>
        </div>
    </div>
</div>

</html>
