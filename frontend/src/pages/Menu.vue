<script setup>
import { ref } from 'vue';
import { getItems } from '../services/items-service';
import Loading from '../components/Loading.vue';
import { useToast } from 'primevue/usetoast';
import Toast from 'primevue/toast';

    const toast = useToast();

    const items = ref([]);
    const isLoading = ref(true);

    const showToast = () => {
        console.log('showToast');
        toast.add({ 
                severity: 'error', 
                summary: 'Error', 
                detail: 'There is a problem fetching the data, try again later.', 
                life: 3000,
                group: 'br',
            });
    }


    try {
        getItems()
        .then((data) => {
            //console.log(data);
            items.value = data;
            isLoading.value = false;
        });
    } catch (e) {
        console.error(`Error fetching data: ${e}`)
    }
</script>

<template lang="">
    <div class="pt-20">
        <h1>See our pizzas and more!</h1>
        <div class="flex flex-wrap gap-5">
            <Loading v-if="isLoading" />
            <div
                v-else
                class="border-2 border-green-300 w-[20%]" 
                v-for="(item, index) in items" 
                :key="index">
                {{ item.name }}
                <img :src=item.image_path alt="item_image" />
            </div>
        </div>
        <button @click="showToast">click me to show toast</button>
    </div>
    <Toast />
</template>

<style lang="">
    
</style>