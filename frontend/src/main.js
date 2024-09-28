import { createApp } from 'vue'
import router from './router/router';
import App from './App.vue';

import './index.css';

import PrimeVue from "primevue/config";
import ToastService from 'primevue/toastservice';
import Toast from 'primevue/toast';

import { OhVueIcon, addIcons } from "oh-vue-icons";
import { 
    PrSpinner,
    HiHome, 
    MdMenubookRound,
    BiCardList,
    CoPizza,
    GiMeal,
    IoIceCreamSharp,
    CoDrink,
    LaWineBottleSolid,
} from "oh-vue-icons/icons";

addIcons(
    PrSpinner, 
    HiHome, 
    MdMenubookRound, 
    BiCardList,
    CoPizza,
    GiMeal,
    IoIceCreamSharp,
    CoDrink,
    LaWineBottleSolid
);

const app = createApp(App); 

app.component("v-icon", OhVueIcon);
app.use(PrimeVue, {
    unstyled: true
});
app.use(ToastService);
app.component('Toast', Toast);
app.use(router).mount('#app');
