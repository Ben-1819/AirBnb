<script setup>
import { ref } from 'vue';
import axios from 'axios';

const checkedAmenities = ref([]);
const id = defineProps({
    id: Number
})

/*const editAmenities = () => {
    console.log("Button Clicked");
    console.log(id)
    axios.post("/amenity/edit", { checkedAmenities: checkedAmenities.value, id: id }, {
        headers: {
        'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(response => {
      console.log('Data sent successfully:', response.data);
    })
    .catch(error => {
      console.error('Error sending data:', error);
    });
};*/

async function sendToController(){
    console.log("Button Clicked");
    const response = await axios.post('/checkedAmenities', { checkedAmenities: checkedAmenities.value, id: id}, {
        headers: {
        'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
        }
    })
    if(response.status === 200 || response.status === 302){
        window.location.href = '/dashboard';
    }
    else{
        console.error("Problem");
    }
}
</script>

<template>
    <div id="checkboxes">
        <div>
            <p>Checked Amenities: {{ checkedAmenities }} for property: {{ id }}</p>

        </div>
        <div class="flex h-screen bg-gray-100">
            <div class="m-auto">
                <div class="mt-5 bg-white rounded-lg shadow">
                    <div class="flex">
                        <div class="flex-1 py-5 pl-5 overflow-hidden">
                            <h1 class="inline text-2xl font-semibold leading-none">Bathroom</h1>
                        </div>
                    </div>
                    <div class="px-5 pb-5">
                        <div class="flex">
                            <div class="flex-grow">
                                <label for="hairdryer" class="text-xl">Hairdryer: </label>
                                <input type="checkbox" id="hairdryer" name="hairdryer" value="Hairdryer" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                            <div class="flex-grow">
                                <label for="cleaning_products" class="text-xl">Cleaning Products</label>
                                <input type="checkbox" id="cleaning_products" name="cleaning_products" value="Cleaning Products" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                            <div class="flex-grow">
                                <label for="hot_water" class="text-xl">Hot Water</label>
                                <input type="checkbox" id="hot_water" name="hot_water" value="Hot Water" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                        </div>
                    </div>
                    <div class="px-5 pb-5">
                        <div class="flex">
                            <div class="flex-grow">
                                <label for="essentials" class="text-xl">Essentials</label>
                                <input type="checkbox" id="essentials" name="essentials" value="Essentials" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                            <div class="flex-grow">
                                <label for="shampoo" class="text-xl">Shampoo</label>
                                <input type="checkbox" id="shampoo" name="shampoo" value="Shampoo" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                        </div>
                    </div>
                    <hr class="mt-3 mb-3">
                    <div class="flex">
                        <div class="flex-1 py-5 pl-5 overflow-hidden">
                            <h1 class="inline text-2xl font-semibold leading-none">Laundry</h1>
                        </div>
                    </div>
                    <div class="px-5 pb-5">
                        <div class="flex">
                            <div class="flex-grow">
                                <label for="washer" class="text-xl">Washer</label>
                                <input type="checkbox" id="washer" name="washer" value="Washer" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                            <div class="flex-grow">
                                <label for="bed_linen" class="text-xl">Bed Linen</label>
                                <input type="checkbox" id="bed_linen" name="bed_linen" value="Bed Linen" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                            <div class="flex-grow">
                                <label for="extra_pillows_and_blankets" class="text-xl">Extra Pillows and Blankets</label>
                                <input type="checkbox" id="extra_pillows_and_blankets" name="extra_pillows_and_blankets" value="Extra Pillows And Blankets" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                        </div>
                    </div>
                    <div class="px-5 pb-5">
                        <div class="flex">
                            <div class="flex-grow">
                                <label for="clothes_drying_rack" class="text-xl">Clothes Drying Rack</label>
                                <input type="checkbox" id="clothes_drying_rack" name="clothes_drying_rack" value="Clothes Drying Rack" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                            <div class="flex-grow">
                                <label for="clothes_storage" class="text-xl">Clothes Storage</label>
                                <input type="checkbox" id="clothes_storage" name="clothes_storage" value="Clothes Storage" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                        </div>
                    </div>
                    <hr class="mt-3 mb-3">
                    <div class="flex">
                        <div class="flex-1 py-5 pl-5 overflow-hidden">
                            <h1 class="inline text-2xl font-semibold leading-none">Heating</h1>
                        </div>
                    </div>
                    <div class="px-5 pb-5">
                        <div class="flex">
                            <div class="flex-grow">
                                <label for="indoor_fireplace" class="text-xl">Indoor Fireplace</label>
                                <input type="checkbox" id="indoor_fireplace" name="indoor_fireplace" value="Indoor Fireplace" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                            <div class="flex-grow">
                                <label for="portable_heater" class="text-xl">Portable Heater</label>
                                <input type="checkbox" id="portable_heater" name="portable_heater" value="Portable Heater" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                            <div class="flex-grow">
                                <label for="radiant_heating" class="text-xl">Radiant Heating</label>
                                <input type="checkbox" id="radiant_heating" name="radiant_heating" value="Radiant Heating" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                        </div>
                    </div>
                    <div class="px-5 pb-5">
                        <div class="flex">
                            <div class="flex-grow">
                                <label for="air_conditioning" class="text-xl">Air Conditioning</label>
                                <input type="checkbox" id="air_conditioning" name="air_conditioning" value="Air Conditioning" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                        </div>
                    </div>
                    <hr class="mt-3 mb-3">
                    <div class="flex">
                        <div class="flex-1 py-5 pl-5 overflow-hidden">
                            <h1 class="inline text-2xl font-semibold leading-none">Security</h1>
                        </div>
                    </div>
                    <div class="px-5 pb-5">
                        <div class="flex">
                            <div class="flex-grow">
                                <label for="smoke_alarm" class="text-xl">Smoke Alarm</label>
                                <input type="checkbox" id="smoke_alarm" name="smoke_alarm" value="Smoke Alarm" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                            <div class="flex-grow">
                                <label for="carbon_monoxide_alarm" class="text-xl">Carbon Monoxide Alarm</label>
                                <input type="checkbox" id="carbon_monoxide_alarm" name="carbon_monoxide_alarm" value="Carbon Monoxide Alarm" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                            <div class="flex-grow">
                                <label for="fire_extinguisher" class="text-xl">Fire Extinguisher</label>
                                <input type="checkbox" id="fire_extinguisher" name="fire_extinguisher" value="Fire Extinguisher" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                        </div>
                    </div>
                    <div class="px-5 pb-5">
                        <div class="flex">
                            <div class="flex-grow">
                                <label for="first_aid_kit" class="text-xl">First Aid Kit</label>
                                <input type="checkbox" id="first_aid_kit" name="first_aid_kit" value="First Aid Kit" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                            <div class="flex-grow">
                                <label for="exterior_cameras" class="text-xl">Exterior Cameras</label>
                                <input type="checkbox" id="exterior_cameras" name="exterior_cameras" value="Exterior Cameras" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                        </div>
                    </div>
                    <hr class="mt-3 mb-3">
                    <div class="flex">
                        <div class="flex-1 py-5 pl-5 overflow-hidden">
                            <h1 class="inline text-2xl font-semibold leading-none">Kitchen</h1>
                        </div>
                    </div>
                    <div class="px-5 pb-5">
                        <div class="flex">
                            <div class="flex-grow">
                                <label for="kitchen" class="text-xl">Kitchen</label>
                                <input type="checkbox" id="kitchen" name="kitchen" value="Kitchen" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                            <div class="flex-grow">
                                <label for="fridge" class="text-xl">Fridge</label>
                                <input type="checkbox" id="fridge" name="fridge" value="Fridge" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                            <div class="flex-grow">
                                <label for="microwave" class="text-xl">Microwave</label>
                                <input type="checkbox" id="microwave" name="microwave" value="Microwave" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                        </div>
                    </div>
                    <div class="px-5 pb-5">
                        <div class="flex">
                            <div class="flex-grow">
                                <label for="cooking_basics" class="text-xl">Cooking Basics</label>
                                <input type="checkbox" id="cooking_basics" name="cooking_basics" value="Cooking Basics" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                            <div class="flex-grow">
                                <label for="dishes_and_cutlery" class="text-xl">Dishes and Cutlery</label>
                                <input type="checkbox" id="dishes_and_cutlery" name="dishes_and_cutlery" value="Dishes and Cutlery" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                            <div class="flex-grow">
                                <label for="cooker" class="text-xl">Cooker</label>
                                <input type="checkbox" id="cooker" name="cooker" value="Cooker" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                        </div>
                    </div>
                    <div class="px-5 pb-5">
                        <div class="flex">
                            <div class="flex-grow">
                                <label for="over" class="text-xl">Oven</label>
                                <input type="checkbox" id="oven" name="oven" value="Oven" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                            <div class="flex-grow">
                                <label for="kettle" class="text-xl">Kettle</label>
                                <input type="checkbox" id="kettle" name="kettle" value="Kettle" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                            <div class="flex-grow">
                                <label for="wine_glasses" class="text-xl">Wine Glasses</label>
                                <input type="checkbox" id="wine_glasses" name="wine_glasses" value="Wine Glasses" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                        </div>
                    </div>
                    <div class="px-5 pb-5">
                        <div class="flex">
                            <div class="flex-grow">
                                <label for="toaster" class="text-xl">Toaster</label>
                                <input type="checkbox" id="toaster" name="toaster" value="Toaster" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                            <div class="flex-grow">
                                <label for="baking_sheet" class="text-xl">Baking Sheet</label>
                                <input type="checkbox" id="baking_sheet" name="baking_sheet" value="Baking Sheet" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                            <div class="flex-grow">
                                <label for="dining_table" class="text-xl">Dining Table</label>
                                <input type="checkbox" id="dining_table" name="dining_table" value="Dining Table" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                        </div>
                    </div>
                    <hr class="mt-3 mb-3">
                    <div class="flex">
                        <div class="flex-1 py-5 pl-5 overflow-hidden">
                            <h1 class="inline text-2xl font-semibold leading-none">Outdoor</h1>
                        </div>
                    </div>
                    <div class="px-5 pb-5">
                        <div class="flex">
                            <div class="flex-grow">
                                <label for="back_garden" class="text-xl">Back Garden</label>
                                <input type="checkbox" id="back_garden" name="back_garden" value="Back Garden" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                            <div class="flex-grow">
                                <label for="firepit" class="text-xl">Firepit</label>
                                <input type="checkbox" id="firepit" name="firepit" value="Firepit" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                            <div class="flex-grow">
                                <label for="outdoor_furniture">Outdoor Furniture</label>
                                <input type="checkbox" id="outdoor_furniture" name="outdoor_furniture" value="Outdoor Furniture" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                        </div>
                    </div>
                    <div class="px-5 pb-5">
                        <div class="flex">
                            <div class="flex-grow">
                                <label for="outdoor_dining_area" class="text-xl">Outdoor Dining Area</label>
                                <input type="checkbox" id="outdoor_dining_area" name="outdoor_dining_area" value="Outdoor Dining Area" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                            <div class="flex-grow">
                                <label for="bbq_grill" class="text-xl">BBQ Grill</label>
                                <input type="checkbox" id="bbq_grill" name="bbq_grill" value= "BBQ Grill" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                        </div>
                    </div>
                    <hr class="mt-3 mb-3">
                    <div class="flex">
                        <div class="flex-1 py-5 pl-5 overflow-hidden">
                            <h1 class="inline text-2xl font-semibold leading-none">View</h1>
                        </div>
                    </div>
                    <div class="px-5 pb-5">
                        <div class="flex">
                            <div class="flex-grow">
                                <label for="seaside" class="text-xl">Seaside</label>
                                <input type="checkbox" id="seaside" name="seaside" value="Seaside" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                            <div class="flex-grow">
                                <label for="country" class="text-xl">Country</label>
                                <input type="checkbox" id="country" name="country" value="Country" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                            <div class="flex-grow">
                                <label for="mountains" class="text-xl">Mountains</label>
                                <input type="checkbox" id="mountains" name="mountains" value="Mountains" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                        </div>
                    </div>
                    <div class="px-5 pb-5">
                        <div class="flex">
                            <div class="flex-grow">
                                <label for="city" class="text-xl">City</label>
                                <input type="checkbox" id="city" name="city" value="City" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                        </div>
                    </div>
                    <hr class="mt-3 mb-3">
                    <div class="flex">
                        <div class="flex-1 py-5 pl-5 overflow-hidden">
                            <h1 class="inline text-2xl font-semibold leading-none">Facilities</h1>
                        </div>
                    </div>
                    <div class="px-5 pb-5">
                        <div class="flex">
                            <div class="flex-grow">
                                <label for="private_entrance" class="text-xl">Private Entrance</label>
                                <input type="checkbox" id="private_entrance" name="private_entrance" value="Private Entrance" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                            <div class="flex-grow">
                                <label for="parking" class="text-xl">Parking</label>
                                <input type="checkbox" id="parking" name="parking" value="Parking" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                            <div class="flex-grow">
                                <label for="single_floor_home" class="text-xl">Single Floor Home</label>
                                <input type="checkbox" id="single_floor_home" name="single_floor_home" value="Single Floor Home" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                        </div>
                    </div>
                    <hr class="mt-3 mb-3">
                    <div class="flex">
                        <div class="flex-1 py-5 pl-5 overflow-hidden">
                            <h1 class="inline text-2xl font-semibold leading-none">Family</h1>
                        </div>
                    </div>
                    <div class="px-5 pb-5">
                        <div class="flex">
                            <div class="flex-grow">
                                <label for="high_chair" class="text-xl">High Chair</label>
                                <input type="checkbox" id="high_chair" name="high_chair" value="High Chair" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                            <div class="flex-grow">
                                <label for="childrens_tableware" class="text-xl">Childrens Tableware</label>
                                <input type="checkbox" id="childrens_tableware" name="childrens_tableware" value="Childrens Tableware" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                        </div>
                    </div>
                    <hr class="mt-3 mb-3">
                    <div class="flex">
                        <div class="flex-1 py-5 pl-5 overflow-hidden">
                            <h1 class="inline text-2xl font-semibold leading-none">Services</h1>
                        </div>
                    </div>
                    <div class="px-5 pb-5">
                        <div class="flex">
                            <div class="flex-grow">
                                <label for="long_term_stays" class="text-xl">Long Term Stays</label>
                                <input type="checkbox" id="long_term_stays" name="long_term_stays" value="Long Term Stays" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                        </div>
                    </div>
                    <hr class="mt-3 mb-3">
                    <div class="flex">
                        <div class="flex-1 py-5 pl-5 overflow-hidden">
                            <h1 class="inline text-2xl font-semibold leading-none">Entertainment</h1>
                        </div>
                    </div>
                    <div class="px-5 pb-5">
                        <div class="flex">
                            <div class="flex-grow">
                                <label for="tv" class="text-xl">TV</label>
                                <input type="checkbox" id="tv" name="tv" value="TV" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                        </div>
                    </div>
                    <hr class="mt-3 mb-3">
                    <div class="flex">
                        <div class="flex-1 py-5 pl-5 overflow-hidden">
                            <h1 class="inline text-2xl font-semibold leading-none">Internet</h1>
                        </div>
                    </div>
                    <div class="px-5 pb-5">
                        <div class="flex">
                            <div class="flex-grow">
                                <label for="wifi" class="text-xl">Wifi</label>
                                <input type="checkbox" id="wifi" name="wifi" value="Wifi" class="border-2 border-solid border-red-500" v-model="checkedAmenities">
                            </div>
                        </div>
                    </div>
                    <hr class="mt-3 mb-3">
                    <div class="px-5 pb-5">
                        <div class="flex">
                            <div class="flex-grow">
                                <div class="pt-5 flex items-center justify-center">
                                    <button type="button" class="border-2 border-solid border-red-500" @click="sendToController">Save amenities</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
