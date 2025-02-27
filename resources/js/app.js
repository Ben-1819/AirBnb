import './bootstrap';

import axios from 'axios';

import { createApp } from 'vue';

import amenityBoxes from './components/amenityBoxes.vue';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

createApp({})
.component("AmenityBoxes", amenityBoxes)
.mount("#app")
