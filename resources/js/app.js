require('./bootstrap');

import Alpine from 'alpinejs';
import { createApp } from 'vue';
import AddToCart from './components/AddToCard.vue';


window.Alpine = Alpine;

Alpine.start();

const app = createApp();

app.component('AddToCart',AddToCart);
app.mount('#app');
