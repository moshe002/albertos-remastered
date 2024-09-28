<script setup>
import StartOrder from '../components/order/StartOrder.vue';
import OrderItems from '../components/order/OrderItems.vue';
import { ref } from 'vue';

const orderState = ref(false);

const updateOrderState = (newVal) => {
    orderState.value = newVal;
};

</script>

<template lang="">
    <div class="pt-24">
        <StartOrder :orderState="orderState" @updateOrderState="updateOrderState" v-if="!orderState" />
        <OrderItems v-else />
        <!---
            after first order OrderItems will follow
            <OrderItems />
        -->
    </div>
</template>

<style lang="">
    
</style>