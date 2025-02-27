<!DOCTYPE html>
<x-app-layout>
    <div>
        <form action="{{route("property.update", $property)}}" method="post">
            @csrf
            <div>
                <h1 class="text-2xl flex justify-center">Edit your property</h1>
            </div>
            <div>
                <label for="location" class="text-xl">Location: </label>
                <input id="location" name="location" type="text" class="border-2 border-solid border-red-500" value={{$property->location}}>

                <input type="number" name="number_of_bathrooms" id="number_of_bathrooms" class="border-2 border-solid border-red-500 float justify-center float-right" value={{$property->number_of_bathrooms}}>
                <label for="number_of_bathrooms" class="text-xl float justify-center float-right">Number of Bathrooms: </label>
            </div>

            <div class="pt-5">
                <label for="address" class="text-xl">Address: </label>
                <input id="address" name="address" type="text" class="border-2 border-solid border-red-500" value={{$property->address}}>

                <textarea id="description" name="description" class="border-2 border-solid border-red-500 float justify-center float-right" value={{$property->description}}></textarea>
                <label for="description" class="text-xl float justify-center float-right">Description: </label>
            </div>

            <div class="pt-5">
                <label for="main_category" class="text-xl">Main Category: </label>
                <select name="main_category" id="main_category" class="border-2 border-solid border-red-500" default={{$property->main_category}}>
                    <option value="detatched">Detatched</option>
                    <option value="semi-detatched">Semi-Detatched</option>
                    <option value="flat">Flat</option>
                    <option value="malsonette">Malsonetter</option>
                    <option value="bungalow">Bungalow</option>
                    <option value="log cabin">Log Cabin</option>
                    <option value="mansion">Mansion</option>
                    <option value="treehouse">Treehouse</option>
                    <option value="castle">Castle</option>
                </select>

                <input type="checkbox" name="pets_allowed" id="pets_allowed" class="border-2 border-solid border-red-500 float justify-center float-right mt-7 ml-2" default={{$property->pets_allowed}}>
                <label for="pets_allowed" class="text-xl float justify-center float-right mt-5">Pets Allowed: </label>
            </div>

            <div class="pt-5">
                <label for="sub_category1" class="text-xl">Sub Category 1: </label>

                <select name="sub_category1" id="sub_category1" class="border-2 border-solid border-red-500" default={{$property->sub_category1}}>
                    <option value="city">City</option>
                    <option value="town">Town</option>
                    <option value="village">Village</option>
                    <option value="rural">Rural</option>
                </select>

                <input type="number" id="max_pets" name="max_pets" class="border-2 border-solid border-red-500 float justify-center float-right" value={{$property->max_pets}}>
                <label for="max_pets" class="text-xl float justify-center float-right">Max Pets: </label>
            </div>

            <div class="pt-5">
                <label for="sub_category2" class="text-xl">Sub Category 2:</label>
                <select name="sub_category2" id="sub_category2" class="border-2 border-solid border-red-500" default={{$property->sub_category2}}>
                    <option value="modern">Modern</option>
                    <option value="traditional">Traditional</option>
                    <option value="cozy">Cozy</option>
                </select>

                <input type="text" id="price_per_pet" name="price_per_pet" class="border-2 border-solid border-red-500 float justify-center float-right" value={{$property->price_per_pet}}>
                <label for="price_per_pet" class="text-xl float justify-center float-right">Price Per Pet: £</label>
            </div>

            <div class="pt-5">
                <label for="max_guests" class="text-xl">Max Guests: </label>
                <input id="max_guests" name="max_guests" type="number" class="border-2 border-solid border-red-500" value={{$property->max_guests}}>

                <input type="text" id="price_per_night" name="price_per_night" class="border-2 border-solid border-red-500 float justify-center float-right" value={{$property->price_per_night}}>
                <label for="price_per_night" class="text-xl float justify-center float-right">Price Per Night: £</label>
            </div>

            <div class="pt-5">
                <label for="number_of_bedrooms" class="text-xl">Number of Bedrooms: </label>
                <input id="number_of_bedrooms" name="number_of_bedrooms" type="number" class="border-2 border-solid border-red-500" value={{$property->number_of_bedrooms}}>
            </div>

            <div class="pt-5 flex items-center justify-center">
                <button class="border-2 border-solid border-red-500">Continue to to select amenities</button>
            </div>
        </form>
    </div>
</x-app-layout>
</html>
