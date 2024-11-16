<script setup>
import { useRoute, useRouter } from 'vue-router';
import { computed, ref, onMounted } from 'vue';
import MenuSidebar from '../menu/MenuSidebar.vue';
import Loading from '../Loading.vue';

const route = useRoute();
const router = useRouter();

const currentPath = computed(() => route.path);

const props = defineProps({
    renderMenuItem: {
        type: Function,
        required: true,
    },
    isLoading: {
        type: Boolean,
        required: true,
    },
    renderItemName: {
        type: String,
        required: true,
    },
    renderItem: {
        type: [{}],
        required: true,
    },
});

const orders = ref([]);

onMounted(() => {
    const ordersLS = localStorage.getItem('orders');
    if(ordersLS) {
        orders.value = JSON.parse(ordersLS);
    }
});

const handleOrder = (itemId, itemName, imagePath) => {
    orders.value.push({itemId: itemId, itemName: itemName, imagePath: imagePath});
};

const handleToOrder = () => {
    localStorage.setItem('orders', JSON.stringify(orders.value));
    router.push({ path: '/order', query: { orders: JSON.stringify(orders.value) } });
};

</script>

<template lang="">
    <div class="flex flex-col w-[10%] justify-around p-3 bg-yellow-200">
        <MenuSidebar :renderMenuItem="renderMenuItem" :renderItemName="renderItemName" />
        </div>
        <Loading v-if="isLoading" />
        <div v-else class="flex flex-col items-center justify-start p-3 w-full overflow-auto">
            <h1 class="mb-10 text-3xl">{{ renderItemName }}</h1>
            <div class="flex flex-wrap justify-center gap-5">
                <div
                    class="flex flex-col justify-between items-center gap-5 shadow-lg w-[20%] p-2 rounded-md border-2" 
                    v-for="(item, index) in renderItem" 
                    :key="index">
                    {{ item.item_name }}
                    <img :src=item.image_path alt="item_image" class="" />
                    <button 
                        @click="handleOrder(item.id, item.item_name, item.image_path)" 
                        class="bg-yellow-300 w-20 p-2 rounded-md text-xs"
                    >
                            <v-icon name="co-cart" class="size-4" />
                    </button>
                </div>
            </div>
        </div>
        <button 
            @click="handleToOrder" 
            :class="orders.length > 0 ? 'fixed bottom-10 right-20 w-auto p-3 shadow-2xl rounded-md text-white bg-orange-400 animate-bounce' : 'hidden'"
        >
                <v-icon name="bi-card-list" class="size-5" />
                Your order/s: <span class="text-red-600 text-xl font-bold">{{orders.length}}</span>
        </button>
</template>

<style lang="">
    
</style>