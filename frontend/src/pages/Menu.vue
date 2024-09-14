<script setup>
import { ref } from 'vue';
import { getItems } from '../services/items-service';
import MenuItems from '../components/MenuItems.vue';

    const pizzaItems = ref([]);
    const breakfastMealItems = ref([]);
    const iceCreamItems = ref([]);
    const shakeItems = ref([]);
    const drinkItems = ref([]);

    const isLoading = ref(true);

    try {
        getItems()
        .then((data) => {
            //console.log(data);
            pizzaItems.value = data.pizzas;
            breakfastMealItems.value = data.breakfastMeals;
            iceCreamItems.value = data.iceCreams;
            shakeItems.value = data.shakes;
            drinkItems.value = data.drinks;

            isLoading.value = false;
        });
    } catch (e) {
        console.error(`Error fetching data: ${e}`)
    }
</script>

<template lang="">
    <div class="flex flex-col gap-5 pt-24 pb-3 text-center">
        <h1 class="text-xl">See our pizzas and more!</h1>
        <MenuItems 
            :isLoading="isLoading"
            :pizzaItems="pizzaItems"
            :breakfastMealItems="breakfastMealItems"
            :iceCreamItems="iceCreamItems"
            :shakeItems="shakeItems"
            :drinkItems="drinkItems" 
        /> 
    </div>
</template>

<style lang="">
    
</style>