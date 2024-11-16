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
        type: Array,
        required: true,
    },
});

const orders = ref([]);
const hoverDisplay = ref(false);
const hoverElementData = ref({ item_name: '', item_ingredient: '', price: 0 });
const position = ref({ x: 0, y: 0 });

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

const onHover = (event, itemName, itemIngredient, itemPrice) => {
    hoverDisplay.value = true;
    hoverElementData.value = { item_name: itemName, item_ingredient: itemIngredient, price: itemPrice }
    position.value = { x: event.pageX, y: event.pageY }
}

const hoverStyle = computed(() => ({
    left: `${position.value.x}px`,
    top: `${position.value.y}px`,
}));


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
                class="flex flex-col justify-between items-center gap-5 shadow-lg w-[20%] p-2 rounded-md border-2 hover:border-yellow-300 duration-150" 
                v-for="(item, index) in renderItem" 
                :key="index"
                @mouseover="onHover($event, item.item_name, item.item_ingredients, item.price)"
                @mouseleave="hoverDisplay = false"
            >
                <p>{{ item.item_name }}</p>
                <img :src=item.image_path alt="item_image" class="" loading="lazy" />
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
        :class="orders.length > 0 ? 'fixed bottom-10 right-20 w-auto h-auto p-3 shadow-2xl rounded-md text-white bg-orange-400 animate-bounce' : 'hidden'"
    >
            <v-icon name="bi-card-list" class="size-5" />
            Your order/s: <span class="text-red-600 text-xl font-bold">{{orders.length}}</span>
    </button>
    <div 
        v-if="hoverDisplay" 
        class="flex flex-col w-auto gap-5 absolute p-2 m-3 border-2 border-yellow-200 bg-white shadow-2xl rounded-md z-50"
        :style="hoverStyle"
    >
        <p class="font-bold">{{ hoverElementData.item_name }}</p>
        <div>
            <p class="italic">Ingredients: </p>
            <p class="text-base">{{ hoverElementData.item_ingredient }}</p>
        </div>
        <div class="">
            <p class="italic">Price: </p>
            <p class="text-xl font-bold">{{ hoverElementData.price }}</p>
        </div>
    </div>
</template>

<style lang="">
    
</style>