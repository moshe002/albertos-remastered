<script setup>
import StartOrder from '../components/order/StartOrder.vue';
import MenuItems from '../components/menu/MenuItems.vue';
import SubmitButton from '../components/SubmitButton.vue';
import { ref, onMounted } from 'vue';
import { useRoute, useRouter } from 'vue-router';

const orderState = ref(false);

const route = useRoute();
const router = useRouter();
const orders = ref([]); // final orders variable to render in DOM

let ordersArray = [];
onMounted(() => {
    if (route.query.orders) {
        ordersArray = JSON.parse(route.query.orders);

        const uniqueItemIds = new Set();
        const filteredOrders = [];
        const itemCounts = {};

        for (const order of ordersArray) {
            // Increment the count for this itemId
            if (itemCounts[order.itemId]) {
                itemCounts[order.itemId]++;
            } else {
                itemCounts[order.itemId] = 1; // Initialize count to 1
            }
        }

        // Now build the filteredOrders with the occurrence count
        for (const order of ordersArray) {
            if (!uniqueItemIds.has(order.itemId)) {
                uniqueItemIds.add(order.itemId);
                // Add the count to the order object
                filteredOrders.push({
                    ...order, // Spread the existing properties
                    count: itemCounts[order.itemId] // Add the count property
                });
            }
        }

        orders.value = filteredOrders;
    }
});

const handleSubmit = () => {
    console.log("handleSubmit");
};

const backToMenu = () => {
    router.push({ path: '/menu' });
};

const cancelOrder = () => {
    localStorage.removeItem('orders');
    router.push({ path: '/menu' });
};

</script>

<template lang="">
    <div class="flex flex-col gap-5 items-center pt-28 pb-5 h-full text-center overflow-auto">
        <h1 class="mb-5">These are your orders:</h1>
        <ul class="flex flex-wrap items-center justify-around gap-3 p-2 w-full">
            <li v-for="(order, index) in orders" :key="index" class="flex flex-col items-center p-2 bg-yellow-300 rounded-md">
                Item Name: {{ order.itemName }}
                <img :src="order.imagePath" alt="item_image" class="h-14 w-14" />
                <p>quantity: {{order.count}}</p>
            </li>
        </ul>
        <form class="flex flex-col items-center text-center gap-5 p-3" @submit.prevent="handleSubmit">
            <div class="flex flex-col border-2">
                <label htmlFor="instruction">Additional Instruction/Message:</label>
                <textarea
                    cols="30"
                    rows="5" 
                    id="instruction" 
                    name="instruction"
                    class="border-2 text-center p-1"
                    required
                ></textarea>
            </div>
            <!---
                also pass customer_id
            -->
            <div class="flex gap-3 w-auto">
                <button @click="cancelOrder" class="w-auto p-2 rounded-md text-white bg-orange-400">
                    CANCEL ORDER
                </button>
                <SubmitButton :handleSubmit="handleSubmit" />
            </div>
        </form>
        <button @click="backToMenu" class="flex justify-center items-center w-auto p-2 rounded-md text-white bg-orange-400">
            <v-icon name="bi-arrow-left-short" class="size-8" />
            Back to Menu
        </button>
    </div>
</template>

<style lang="">
    
</style>