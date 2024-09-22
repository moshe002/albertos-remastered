<script setup>
import Loading from '../components/Loading.vue';

const props = defineProps({
  isLoading: {
    type: Boolean,
    default: false,
    required: true
  },
  pizzaItems: {
    type: [{}],
    required: true,
    default: [],
  },
  breakfastMealItems: {
    type: [{}],
    required: true,
    default: [],
  },
  iceCreamItems: {
    type: [{}],
    required: true,
    default: [],
  },
  shakeItems: {
    type: [{}],
    required: true,
    default: [],
  },
  drinkItems: {
    type: [{}],
    required: true,
    default: [],
  }
});
</script>

<template lang="">
    <div class="flex flex-wrap justify-center gap-5">
        <Loading v-if="isLoading" />
        <div class="flex flex-col gap-5 text-center border-2 border-black w-full" v-else>
          <h1>Pizzas</h1>
          <div class="flex flex-wrap justify-center gap-5">
              <div
                  class="border-2 w-[20%]" 
                  v-for="(item, index) in pizzaItems" 
                  :key="index">
                  {{ item.item_name }}
                  <img :src=item.image_path alt="item_image" />
              </div>
          </div>
          <h1>Breakfast Meals</h1>
          <div class="flex flex-wrap justify-center gap-5">
              <div
                  class="border-2 border-green-300 w-[20%]" 
                  v-for="(item, index) in breakfastMealItems" 
                  :key="index">
                  {{ item.item_name }}
                  <img :src=item.image_path alt="item_image" />
              </div>
          </div>
          <h1>Ice Creams</h1>
          <div class="flex flex-wrap justify-center gap-5">
              <div
                  class="border-2 border-green-300 w-[20%]" 
                  v-for="(item, index) in iceCreamItems" 
                  :key="index">
                  {{ item.item_name }}
                  <img :src=item.image_path alt="item_image" />
              </div>
          </div>
          <h1>Shakes</h1>
          <div class="flex flex-wrap justify-center gap-5">
              <div
                  class="border-2 border-green-300 w-[20%]" 
                  v-for="(item, index) in shakeItems" 
                  :key="index">
                  {{ item.item_name }}
                  <img :src=item.image_path alt="item_image" />
              </div>
          </div>
          <h1>Drinks</h1>
          <div class="flex flex-wrap justify-center gap-5">
              <div
                  class="border-2 border-green-300 w-[20%]" 
                  v-for="(item, index) in drinkItems" 
                  :key="index">
                  {{ item.item_name }}
                  <img :src=item.image_path alt="item_image" />
              </div>
          </div>
      </div>
    </div>
</template>

<style lang="">
    
</style>