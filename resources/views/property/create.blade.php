<x-app-layout>
    <div class="flex h-screen bg-gray-100">
        <div class="m-auto">
            <div class="mt-5 bg-white rounded-lg shadow">
                <div class="flex">
                    <div class="flex-1 py-5 pl-5 overflow-hidden">
                        <h1 class="inline text-2xl font-semibold leading-none">Create your property</h1>
                    </div>
                </div>
                <form action="{{route("property.store")}}" method="post">
                    @csrf
                    <div class="px-5 pb-5">
                        <div class="flex">
                            <div class="flex-grow">
                                <label for="main_category" class="text-xl">Main Category: </label>
                                <select name="main_category" id="main_category" class="border-2 border-solid border-red-500">
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
                                @error("main_category")
                                    <x-errors>{{ $message }}</x-errors>
                                @enderror
                            </div>
                            <div class="flex-grow">
                                <label for="sub_category1" class="text-xl">Sub Category 1: </label>
                                <select name="sub_category1" id="sub_category1" class="border-2 border-solid border-red-500">
                                    <option value="city">City</option>
                                    <option value="town">Town</option>
                                    <option value="village">Village</option>
                                    <option value="rural">Rural</option>
                                </select>
                                @error("sub_category1")
                                    <x-errors>{{ $message }}</x-errors>
                                @enderror
                            </div>
                            <div class="flex-grow">
                                <label for="sub_category2" class="text-xl">Sub Category 2:</label>
                                <select name="sub_category2" id="sub_category2" class="border-2 border-solid border-red-500">
                                    <option value="modern">Modern</option>
                                    <option value="traditional">Traditional</option>
                                    <option value="cozy">Cozy</option>
                                </select>
                                @error("sub_category2")
                                    <x-errors>{{ $message }}</x-errors>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr class="mt-3 mb-3">
                    <div class="px-5 pb-5">
                        <div class="flex">
                            <div class="flex-grow">
                                <label for="number_of_bedrooms" class="text-xl">Number of Bedrooms: </label>
                                <input id="number_of_bedrooms" name="number_of_bedrooms" type="number" value="{{old("number_of_bedrooms")}}" class="border-2 border-solid border-red-500">
                                @error("number_of_bedrooms")
                                    <x-errors>{{ $message }}</x-errors>
                                @enderror
                            </div>
                            <div class="flex-grow">
                                <label for="number_of_bathrooms" class="text-xl">Number of Bathrooms: </label>
                                <input type="number" name="number_of_bathrooms" id="number_of_bathrooms" value="{{old("number_of_bathrooms")}}" class="border-2 border-solid border-red-500">
                                @error("number_of_bathrooms")
                                    <x-errors>{{ $message }}</x-errors>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr class="mt-3 mb-3">
                    <div class="px-5 pb-5">
                        <div class="flex">
                            <div class="flex-grow">
                                <label for="max_guests" class="text-xl">Max Guests: </label>
                                <input id="max_guests" name="max_guests" type="number" value="{{old("max_guests")}}" class="border-2 border-solid border-red-500">
                                @error("max_guests")
                                    <x-errors>{{ $message }}</x-errors>
                                @enderror
                            </div>
                            <div class="flex-grow">
                                <label for="price_per_night" class="text-xl">Price Per Night: £</label>
                                <input type="text" id="price_per_night" name="price_per_night" value="{{old("price_per_night")}}" class="border-2 border-solid border-red-500">
                                @error("price_per_night")
                                    <x-errors>{{ $message }}</x-errors>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr class="mt-3 mb-3">
                    <div class="px-5 pb-5">
                        <div class="flex">
                            <div class="flex-grow">
                                <label for="pets_allowed" class="text-xl">Pets Allowed: </label>
                                <input type="checkbox" name="pets_allowed" id="pets_allowed" value="{{old("pets_allowed")}}" class="border-2 border-solid border-red-500">
                                @error("pets_allowed")
                                    <x-errors>{{ $message }}</x-errors>
                                @enderror
                            </div>
                            <div class="flex-grow">
                                <label for="max_pets" class="text-xl">Max Pets: </label>
                                <input type="number" id="max_pets" name="max_pets" value="{{old("max_pets")}}" class="border-2 border-solid border-red-500">
                                @error("max_pets")
                                    <x-errors>{{ $message }}</x-errors>
                                @enderror
                            </div>
                            <div class="flex-grow">
                                <label for="price_per_pet" class="text-xl">Price Per Pet: £</label>
                                <input type="text" id="price_per_pet" name="price_per_pet" value="{{old("price_per_pet")}}" class="border-2 border-solid border-red-500">
                                @error("price_per_pet")
                                    <x-errors>{{ $message }}</x-errors>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr class="mt-3 mb-3">
                    <div class="px-5 pb-5">
                        <div class="flex">
                            <div class="flex-grow">
                                <div class="flex items-center justify-center">
                                    <label for="description" class="text-xl">Description: </label>
                                    <textarea id="description" name="description" value="{{old("description")}}" class="border-2 border-solid border-red-500"></textarea>
                                    @error("description")
                                        <x-errors>{{ $message }}</x-errors>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="mt-3 mb-3">
                    <div class="px-5 pb-5">
                        <div class="flex">
                            <div class="flex-grow">
                                <div class="pt-5 flex items-center justify-center">
                                    <button class="border-2 border-solid border-red-500">Continue to to location entry</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
