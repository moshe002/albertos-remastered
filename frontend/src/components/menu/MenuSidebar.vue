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
    },
    renderItemName: {
        type: String,
        required: true,
    }
});

</script>

<template lang="">
    <div 
        v-for="(category, index) in itemCategories" 
        :class="[
            'py-2 hover:bg-orange-600/20 rounded-md', 
            renderItemName === category.name ? 'border-b-2 border-orange-500/70' : '',
            'duration-200'
        ]" 
        :key="index"
        @click="renderMenuItem(category.name)">
            <button :title="category.name">
                <v-icon :name="category.icon" class="size-10 text-orange-400" />
            </button>
    </div>
</template>

<style lang="">
    
</style>