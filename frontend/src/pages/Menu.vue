<template lang="">
    <div>
        <h1>menu page</h1>
        <div class="flex flex-wrap gap-5">
            <div
                class="border-2 border-green-300 w-[20%]" 
                v-for="(item, index) in items" 
                :key="index">
                {{ item.name }}
                <img :src=item.image_path alt="item_image" />
            </div>
        </div>
    </div>
</template>
<script setup>
import { ref } from 'vue';
import { getItems } from '../services/items-service';
/**
 * TODO:
 * 
 * display fetched items in page
 * create UI
 * learn axios
 * 
 */
    const items = ref([]);
    try {
        getItems()
        .then((data) => {
            console.log(data);
            items.value = data;
        });
    } catch (e) {
        console.error(`Error fetching data: ${e}`)
    }

</script>
<style lang="">
    
</style>