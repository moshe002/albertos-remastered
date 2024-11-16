<script setup>
import { ref, onMounted } from 'vue';
import { getItems } from '../services/items-service';
import MenuItems from '../components/menu/MenuItems.vue';

const pizzaItems = ref([]);
const breakfastMealItems = ref([]);
const iceCreamItems = ref([]);
const shakeItems = ref([]);
const drinkItems = ref([]);

const renderItem = ref([]);
const renderItemName = ref("");

const isLoading = ref(true);

const fetchMenuData = async () => {
    try {
        const data = await getItems();
        //console.log(data);
        pizzaItems.value = data.pizzas;
        breakfastMealItems.value = data.breakfastMeals;
        iceCreamItems.value = data.iceCreams;
        shakeItems.value = data.shakes;
        drinkItems.value = data.drinks;

        isLoading.value = false;
        renderMenuItem("Pizzas");
    } catch (e) {
        console.error(`Error fetching data: ${e}`)
    }
}

onMounted(() => {
    fetchMenuData();
});

const renderMenuItem = (categoryName) => {
    renderItemName.value = categoryName;
    switch(categoryName) {
        case "Pizzas":
            renderItem.value = pizzaItems.value;
            break;
        case "Breakfast Meals":
            renderItem.value = breakfastMealItems.value;
            break;
        case "Ice Creams":
            renderItem.value = iceCreamItems.value;    
            break;
        case "Shakes":
            renderItem.value = shakeItems.value;    
            break;
        case "Drinks":
            renderItem.value = drinkItems.value;    
            break;
    }
};
</script>

<template lang="">
    <div class="flex pt-24 h-screen text-center">
        <MenuItems
            :renderItem="renderItem"
            :renderItemName="renderItemName" 
            :isLoading="isLoading" 
            :renderMenuItem="renderMenuItem" 
        />
    </div>
</template>

<style lang="">
    
</style>