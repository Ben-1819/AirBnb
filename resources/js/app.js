import './bootstrap';

import axios from 'axios';

import { createApp } from 'vue';

import amenityBoxes from './components/amenityBoxes.vue';

import editAmenities from './components/editAmenities.vue';

import storeLocation from './components/storeLocation.vue';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

createApp({})
.component("AmenityBoxes", amenityBoxes)
.component("EditAmenities", editAmenities)
.component("StoreLocation", storeLocation)
.mount("#app")
