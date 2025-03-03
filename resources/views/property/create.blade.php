<!DOCTYPE html>
    <x-app-layout>
        <div class="container mt-5">
            <div class="row">
                <div class="col-xl-8 m-auto">
                    <form action="{{route("property.store")}}" method="post">
                        @csrf
                        <div>
                            <h1 class="text-2xl flex justify-center">Create your property</h1>
                        </div>
                        <div class="row row-space mb-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="location" class="text-xl">Location: </label>
                                    <input id="location" name="location" type="text" value="{{old("location")}}" class="border-2 border-solid border-red-500">
                                    @error("location")
                                        <x-errors>{{ $message }}</x-errors>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <input type="number" name="number_of_bathrooms" id="number_of_bathrooms" value="{{old("number_of_bathrooms")}}" class="border-2 border-solid border-red-500 float justify-center float-right">
                                    <label for="number_of_bathrooms" class="text-xl float justify-center float-right">Number of Bathrooms: </label>
                                    @error("number_of_bathrooms")
                                        <x-errors>{{ $message }}</x-errors>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row row-space mb-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="address" class="text-xl">Address: </label>
                                    <input id="address" name="address" type="text" value="{{old("address")}}" class="border-2 border-solid border-red-500">
                                    @error("address")
                                        <x-errors>{{ $message }}</x-errors>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <textarea id="description" name="description" value="{{old("description")}}" class="border-2 border-solid border-red-500 float justify-center float-right"></textarea>
                                    <label for="description" class="text-xl float justify-center float-right">Description: </label>
                                    @error("description")
                                        <x-errors>{{ $message }}</x-errors>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row row-space mb-3">
                            <div class="col-6">
                                <div class="form-group">
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
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <input type="checkbox" name="pets_allowed" id="pets_allowed" value="{{old("pets_allowed")}}" class="border-2 border-solid border-red-500 float justify-center float-right mt-7 ml-2">
                                    <label for="pets_allowed" class="text-xl float justify-center float-right mt-5">Pets Allowed: </label>
                                    @error("pets_allowed")
                                        <x-errors>{{ $message }}</x-errors>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row row-space mb-3">
                            <div class="col-6">
                                <div class="form-group">
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
                            </div>


                            <div class="col-6">
                                <div class="form-group">
                                    <input type="number" id="max_pets" name="max_pets" value="{{old("max_pets")}}" class="border-2 border-solid border-red-500 float justify-center float-right">
                                    <label for="max_pets" class="text-xl float justify-center float-right">Max Pets: </label>
                                    @error("max_pets")
                                        <x-errors>{{ $message }}</x-errors>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row row-space mb-3">
                            <div class="col-6">
                                <div class="form-group">
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

                            <div class="col-6">
                                <div class="form-group">
                                    <input type="text" id="price_per_pet" name="price_per_pet" value="{{old("price_per_pet")}}" class="border-2 border-solid border-red-500 float justify-center float-right">
                                    <label for="price_per_pet" class="text-xl float justify-center float-right">Price Per Pet: £</label>
                                    @error("price_per_pet")
                                        <x-errors>{{ $message }}</x-errors>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row row-space mb-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="max_guests" class="text-xl">Max Guests: </label>
                                    <input id="max_guests" name="max_guests" type="number" value="{{old("max_guests")}}" class="border-2 border-solid border-red-500">
                                    @error("max_guests")
                                        <x-errors>{{ $message }}</x-errors>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <input type="text" id="price_per_night" name="price_per_night" value="{{old("price_per_night")}}" class="border-2 border-solid border-red-500 float justify-center float-right">
                                    <label for="price_per_night" class="text-xl float justify-center float-right">Price Per Night: £</label>
                                    @error("price_per_night")
                                        <x-errors>{{ $message }}</x-errors>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row row-space mb-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="number_of_bedrooms" class="text-xl">Number of Bedrooms: </label>
                                    <input id="number_of_bedrooms" name="number_of_bedrooms" type="number" value="{{old("number_of_bedrooms")}}" class="border-2 border-solid border-red-500">
                                    @error("number_of_bedrooms")
                                        <x-errors>{{ $message }}</x-errors>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="pt-5 flex items-center justify-center">
                            <button class="border-2 border-solid border-red-500">Continue to to select amenities</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-app-layout>
</html>
