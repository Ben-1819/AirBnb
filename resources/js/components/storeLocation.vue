<script setup>
import { ref } from 'vue';
import axios from 'axios';
async function sendToController(){
    console.log("Button Clicked");
    const response = await axios.post('/location', { address: address.value, city: city.value, state: state.value, postcode: postcode.value}, {
        headers: {
        'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
        }
    })
    if(response.status === 200 || response.status === 302){
        window.location.href = '/amenity';
    }
    else{
        console.error("Problem");
    }
}
</script>

<template>
    <div class="flex h-screen bg-gray-100">
        <div class="m-auto">
            <div class="mt-5 bg-white rounded-lg shadow">
                <div class="flex">
                    <div class="flex-1 py-5 pl-5 overflow-hidden">
                        <h1 class="inline text-2xl font-semibold leading-none">Address:</h1>
                    </div>
                </div>
                <div class="px-5 pb-5">
                    <div class="flex">
                        <div class="flex-grow">
                            <div class="pt-5 flex items-center justify-center">
                                <input class="input mb12 border-2 border-solid border-red-500" name="address" id="address" autocomplete="shipping address-line1" placeholder="Address" v-model="address">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-5 pb-5">
                    <div class="flex">
                        <div class="flex-grow">
                            <div class="pt-5 flex items-center justify-center">
                                <input class="input mb12 border-2 border-solid border-red-500" name="city" id="city" autocomplete="shipping address-level2" placeholder="City" v-model="city">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-5 pb-5">
                    <div class="flex">
                        <div class="flex-grow">
                            <div class="pt-5 flex items-center justify-center">
                                <input class="input mb12 ml6 border-2 border-solid border-red-500" name="state" id="state" autocomplete="shipping address-level1" placeholder="State" v-model="state">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-5 pb-5">
                    <div class="flex">
                        <div class="flex-grow">
                            <div class="pt-5 flex items-center justify-center">
                                <input class="input mb12 ml6 border-2 border-solid border-red-500" name="postcode" id="postcode" autocomplete="shipping postal-code" placeholder="ZIP / Postcode" v-model="postcode">
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="mt-3 mb-3">
                <div class="px-5 pb-5">
                    <div class="flex">
                        <div class="flex-grow">
                            <div class="pt-5 flex items-center justify-center">
                                <button type="button" class="border-2 border-solid border-red-500" @click="sendToController">Save Location</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    const ACCESS_TOKEN = 'pk.eyJ1IjoiYmVuMTgxOSIsImEiOiJjbTd4NTRkMGowMXF3MmlzNm11NGs4N2xpIn0.7FEx1diDtxvqUcyVq6zLUQ';
    window.addEventListener('load', () => {

        const collection = mapboxsearch.autofill({
            accessToken: ACCESS_TOKEN
        });
    });
</script>
