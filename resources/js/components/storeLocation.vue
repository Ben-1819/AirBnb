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
    <div class="container mt-5">
        <div class="row">
            <div class="col-xl-8 m-auto">
                <div class="card-shadow">
                    <form>
                        <h3 class="title fw-bold border-bottom pb-3">Enter the address of your property</h3>
                        <div class="card-body">
                            <div class="row row-space mb-3">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="input mb12 border-2 border-solid border-red-500" name="address" id="address" autocomplete="shipping address-line1" placeholder="Address" v-model="address">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space mb-3">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="input mb12 border-2 border-solid border-red-500" name="city" id="city" autocomplete="shipping address-level2" placeholder="City" v-model="city">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space mb-3">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="input mb12 ml6 border-2 border-solid border-red-500" name="state" id="state" autocomplete="shipping address-level1" placeholder="State" v-model="state">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space mb-3">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="input mb12 ml6 border-2 border-solid border-red-500" name="postcode" id="postcode" autocomplete="shipping postal-code" placeholder="ZIP / Postcode" v-model="postcode">
                                    </div>
                                </div>
                            </div>
                            <button type="button" @click="sendToController" class="border-2 border-solid border-red-500">Save location</button>
                        </div>
                    </form>
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
