<!DOCTYPE html>
@vite("resources/js/getChecked.js")
    <x-app-layout>
        <div>
            <h1 class="flex justify-center text-2xl">Add Amenities</h1>
        </div>
        <form>
            <div id="checkboxes">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <h2 class="text-xl">Bathroom</h2>
                    <label for="hairdryer">Hairdryer: </label>
                    <input type="checkbox" id="hairdryer" name="hairdryer" value="Hairdryer">
                    <label for="cleaning_products">Cleaning Products</label>
                    <input type="checkbox" id="cleaning_products" name="cleaning_products" value="Cleaning Products">
                    <label for="hot_water">Hot Water</label>
                    <input type="checkbox" id="hot_water" name="hot_water" value="Hot Water">
                    <label for="essentials">Essentials</label>
                    <input type="checkbox" id="essentials" name="essentials" vlaue="Essentials">
                    <label for="shampoo">Shampoo</label>
                    <input type="checkbox" id="shampoo" name="shampoo" value="Shampoo">
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <h2 class="text-xl">Laundry</h2>
                    <label for="washer">Washer</label>
                    <input type="checkbox" id="washer" name="washer" value="Washer">
                    <label for="bed_linen">Bed Linen</label>
                    <input type="checkbox" id="bed_linen" name="bed_linen" value="Bed Linen">
                    <label for="extra_pillows_and_blankets">Extra Pillows and Blankets</label>
                    <input type="checkbox" id="extra_pillows_and_blankets" name="extra_pillows_and_blankets" value="Extra Pillows And Blankets">
                    <label for="clothes_drying_rack">Clothes Drying Rack</label>
                    <input type="checkbox" id="clothes_drying_rack" name="clothes_drying_rack" value="Clothes Drying Rack">
                    <label for="clothes_storage">Clothes Storage</label>
                    <input type="checkbox" id="clothes_storage" name="clothes_storage" value="Clothes Storage">
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <h2 class="text-xl">Heating</h2>
                    <label for="indoor_fireplace">Indoor Fireplace</label>
                    <input type="checkbox" id="indoor_fireplace" name="indoor_fireplace" value="Indoor Fireplace">
                    <label for="portable_heater">Portable Heater</label>
                    <input type="checkbox" id="portable_heater" name="portable_heater" value="Portable Heater">
                    <label for="radiant_heating">Radiant Heating</label>
                    <input type="checkbox" id="radiant_heating" name="radiant_heating" value="Radiant Heating">
                    <label for="air_conditioning">Air Conditioning</label>
                    <input type="checkbox" id="air_conditioning" name="air_conditioning" value="Air Conditioning">
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <h2 class="text-xl">Security</h2>
                    <label for="smoke_alarm">Smoke Alarm</label>
                    <input type="checkbox" id="smoke_alarm" name="smoke_alarm" value="Smoke Alarm">
                    <label for="carbon_monoxide_alarm">Carbon Monoxide Alarm</label>
                    <input type="checkbox" id="carbon_monoxide_alarm" name="carbon_monoxide_alarm" value="Carbon Monoxide Alarm">
                    <label for="fire_extinguisher">Fire Extinguisher</label>
                    <input type="checkbox" id="fire_extinguisher" name="fire_extinguisher" value="Fire Extinguisher">
                    <label for="first_aid_kit">First Aid Kit</label>
                    <input type="checkbox" id="first_aid_kit" name="first_aid_kit" value="First Aid Kit">
                    <label for="exterior_cameras">Exterior Cameras</label>
                    <input type="checkbox" id="exterior_cameras" name="exterior_cameras" value="Exterior Cameras">
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <h2 class="text-xl">Kitchen</h2>
                    <label for="kitchen">Kitchen</label>
                    <input type="checkbox" id="kitchen" name="kitchen" value="Kitchen">
                    <label for="fridge">Fridge</label>
                    <input type="checkbox" id="fridge" name="fridge" value="Fridge">
                    <label for="microwave">Microwave</label>
                    <input type="checkbox" id="microwave" name="microwave" value="Microwave">
                    <label for="cooking_basics">Cooking Basics</label>
                    <input type="checkbox" id="cooking_basics" name="cooking_basics" value="Cooking Basics">
                    <label for="dishes_and_cutlery">Dishes and Cutlery</label>
                    <input type="checkbox" id="dishes_and_cutlery" name="dishes_and_cutlery" value="Dishes and Cutlery">
                    <label for="cooker">Cooker</label>
                    <input type="checkbox" id="cooker" name="cooker" value="Cooker">
                    <label for="over">Oven</label>
                    <input type="checkbox" id="oven" name="oven" value="Oven">
                    <label for="kettle">Kettle</label>
                    <input type="checkbox" id="kettle" name="kettle" value="Kettle">
                    <label for="wine_glasses">Wine Glasses</label>
                    <input type="checkbox" id="wine_glasses" name="wine_glasses" value="Wine Glasses">
                    <label for="toaster">Toaster</label>
                    <input type="checkbox" id="toaster" name="toaster" value="Toaster">
                    <label for="baking_sheet">Baking Sheet</label>
                    <input type="checkbox" id="baking_sheet" name="baking_sheet" value="Baking Sheet">
                    <label for="dining_table">Dining Table</label>
                    <input type="checkbox" id="dining_table" name="dining_table" value="Dining Table">
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <h2 class="text-xl">Outdoor</h2>
                    <label for="back_garden">Back Garden</label>
                    <input type="checkbox" id="back_garden" name="back_garden" value="Back Garden">
                    <label for="firepit">Firepit</label>
                    <input type="checkbox" id="firepit" name="firepit" value="Firepit">
                    <label for="outdoor_furniture">Outdoor Furniture</label>
                    <input type="checkbox" id="outdoor_furniture" name="outdoor_furniture" value="Outdoor Furniture">
                    <label for="outdoor_dining_area">Outdoor Dining Area</label>
                    <input type="checkbox" id="outdoor_dining_area" name="outdoor_dining_area" value="Outdoor Dining Area">
                    <label for="bbq_grill">BBQ Grill</label>
                    <input type="checkbox" id="bbq_grill" name="bbq_grill" value= "BBQ Grill">
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <h2 class="text-xl">View</h2>
                    <label for="seaside">Seaside</label>
                    <input type="checkbox" id="seaside" name="seaside" value="Seaside">
                    <label for="country">Country</label>
                    <input type="checkbox" id="country" name="country" value="Country">
                    <label for="mountains">Mountains</label>
                    <input type="checkbox" id="mountains" name="mountains" value="Mountains">
                    <label for="city">City</label>
                    <input type="checkbox" id="city" name="city" value="City">
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <h2 class="text-xl">Facilities</h2>
                    <label for="private_entrance">Private Entrance</label>
                    <input type="checkbox" id="private_entrance" name="private_entrance" value="Private Entrance">
                    <label for="parking">Parking</label>
                    <input type="checkbox" id="parking" name="parking" value="Parking">
                    <label for="single_floor_home">Single Floor Home</label>
                    <input type="checkbox" id="single_floor_home" name="single_floor_home" value="Single Floor Home">
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <h2 class="text-xl">Family</h2>
                    <label for="high_chair">High Chair</label>
                    <input type="checkbox" id="high_chair" name="high_chair" value="High Chair">
                    <label for="childrens_tableware">Childrens Tableware</label>
                    <input type="checkbox" id="childrens_tableware" name="childrens_tableware" value="Childrens Tableware">
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <h2 class="text-xl">Services</h2>
                    <label for="long_term_stays">Long Term Stays</label>
                    <input type="checkbox" id="long_term_stays" name="long_term_stays" value="Long Term Stays">
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <h2 class="text-xl">Entertainment</h2>
                    <label for="tv">TV</label>
                    <input type="checkbox" id="tv" name="tv" value="TV">
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <h2 class="text-xl">Internet</h2>
                    <label for="wifi">Wifi</label>
                    <input type="checkbox" id="wifi" name="wifi" value="Wifi">
                </div>
            </div>

            <button>Save amenities</button>
        </form>
    </x-app-layout>
</html>

