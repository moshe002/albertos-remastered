<script setup>
import { ref, computed } from 'vue';
import { routes } from '../router/router.js';
import { useRoute } from 'vue-router';
import albertosLogo from '/images/albertos logo.jpg';

const route = useRoute();

const routeData = ref(routes);
const hoveredTab = ref(null);

const showTabName = (tabIndex) => hoveredTab.value = tabIndex;

const displayRoutes = computed(() => {
  const routeValues = routeData.value.slice(0, 2);
  return routeValues.filter(r => r.path !== route.path);
});

</script>

<template>
  <div class="fixed top-0 left-0 w-full h-[10%] z-20">
    <div class="flex justify-between items-center backdrop-blur-sm bg-[#FFFF00]">
      <img class="w-[20%] h-20 ml-3 my-2" :src="albertosLogo" alt="albertos_logo">
      <ul class="flex justify-end gap-10 p-5 bg-transparent">
        <li 
          v-for="(route, index) 
          in displayRoutes" 
          :key="index" 
          @mouseenter="showTabName(index)"
          @mouseleave="hoveredTab = null"
          :class="[
            'transition-all duration-200 ease-in-out',
            hoveredTab === index ? 'w-28' : 'w-14'
          ]">
          <RouterLink :to="route.path" 
            class="
              flex justify-center items-center text-white 
              rounded-full p-3 bg-orange-400
              ">
            <v-icon :name=route.icon class="size-6" />
            <span :class="hoveredTab === index ? 'visible pl-2 font-semibold text-lg' : 'hidden'">
              {{ route.name }}
            </span>
          </RouterLink>
        </li>
      </ul>
    </div>
  </div>

  <RouterView />
</template>

<style lang="scss">
</style>
  