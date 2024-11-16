import { createApp } from 'vue'
import router from './router/router';
import App from './App.vue';

import './index.css';

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
    CoCart,
    BiArrowLeftShort,
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
    LaWineBottleSolid,
    CoCart,
    BiArrowLeftShort
);

const app = createApp(App); 

app.component("v-icon", OhVueIcon);
app.use(router).mount('#app');
