<script setup>
const itemCategories = [
  { name: "Pizzas", icon: "co-pizza", },
  { name: "Breakfast Meals", icon: "gi-meal", },
  { name: "Ice Creams", icon: "io-ice-cream-sharp", },
  { name: "Shakes", icon: "co-drink", },
  { name: "Drinks", icon: "la-wine-bottle-solid", },
];

const props = defineProps({
    renderMenuItem: {
        type: Function,
        required: true, 
    }
});
</script>

<template lang="">
    <div 
        class="" 
        v-for="(category, index) in itemCategories" 
        :key="index"
        @click="renderMenuItem(category.name)">
            <button :title="category.name">
                <v-icon :name="category.icon" class="size-10 text-orange-400" />
            </button>
    </div>
</template>

<style lang="">
    
</style>