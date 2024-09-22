<script setup>
/**
 * render menu items
 * 
 * each item must be clickable
 * onclick save it into a cart (an array or a list in our situation)
 * save its id
 * 
 * on submit call Route::post('items/order', [ItemController::class, 'orderItems']);
 * on submit fetch the order_id and customer_id as well
 * 
 */
import { getItems } from '../../services/items-service';
import { ref } from 'vue';

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

const handleItemId = (id) => {
    console.log("id: ", id);
}

    /**
     * change ui layout to be like
     * the same as mcdonalds kiosk
     * sidebar for different types of items
     * so customer wont scroll up and down too much
     * 
     */
</script>

<template lang="">
    <div>
        <h1>Our items</h1>
        <div class="flex flex-wrap justify-center gap-5">
            <!---
            <Loading v-if="isLoading" />
            v-else
            -->
            <div class="flex flex-col gap-5 text-center border-2 border-black w-full">
                <h1>Pizzas</h1>
                <div class="flex flex-wrap justify-center gap-5">
                    <div
                        class="border-2 w-[20%]" 
                        v-for="(item, index) in pizzaItems" 
                        :key="index"
                        @click="handleItemId(item.id)">
                        {{ item.item_name }}
                        <img :src=item.image_path alt="item_image" />
                    </div>
                </div>
                <h1>Breakfast Meals</h1>
                <div class="flex flex-wrap justify-center gap-5">
                    <div
                        class="border-2 border-green-300 w-[20%]" 
                        v-for="(item, index) in breakfastMealItems" 
                        :key="index"
                        @click="handleItemId(item.id)">
                        {{ item.item_name }}
                        <img :src=item.image_path alt="item_image" />
                    </div>
                </div>
                <h1>Ice Creams</h1>
                <div class="flex flex-wrap justify-center gap-5">
                    <div
                        class="border-2 border-green-300 w-[20%]" 
                        v-for="(item, index) in iceCreamItems" 
                        :key="index"
                        @click="handleItemId(item.id)">
                        {{ item.item_name }}
                        <img :src=item.image_path alt="item_image" />
                    </div>
                </div>
                <h1>Shakes</h1>
                <div class="flex flex-wrap justify-center gap-5">
                    <div
                        class="border-2 border-green-300 w-[20%]" 
                        v-for="(item, index) in shakeItems" 
                        :key="index"
                        @click="handleItemId(item.id)">
                        {{ item.item_name }}
                        <img :src=item.image_path alt="item_image" />
                    </div>
                </div>
                <h1>Drinks</h1>
                <div class="flex flex-wrap justify-center gap-5">
                    <div
                        class="border-2 border-green-300 w-[20%]" 
                        v-for="(item, index) in drinkItems" 
                        :key="index"
                        @click="handleItemId(item.id)">
                        {{ item.item_name }}
                        <img :src=item.image_path alt="item_image" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="">
    
</style>