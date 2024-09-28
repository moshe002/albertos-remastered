<script setup>
import { useRoute, useRouter } from 'vue-router';
import { computed } from 'vue';
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

const handleOrder = () => {
    if(currentPath.value === '/menu') {
        router.push('/order');
    } else {
        console.log('already in /order');
    }
};

</script>

<template lang="">
    <div class="flex flex-col w-[20%] justify-around p-3 bg-yellow-200">
        <MenuSidebar :renderMenuItem="renderMenuItem" />
        </div>
        <Loading v-if="isLoading" />
        <div v-else class="flex flex-col items-center justify-start p-3 w-full overflow-auto">
            <h1 class="mb-16">{{ renderItemName }}</h1>
            <div class="flex flex-wrap justify-center gap-5">
                <div
                    class="border-2 w-[20%]" 
                    v-for="(item, index) in renderItem" 
                    :key="index">
                    {{ item.item_name }}
                    <img :src=item.image_path alt="item_image" />
                    <button @click="handleOrder" class="bg-yellow-300 p-2 rounded-md">ORDER</button>
                </div>
            </div>
        </div>
</template>

<style lang="">
    
</style>