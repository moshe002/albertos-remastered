<template>
  <div>
    <ul class="flex justify-center gap-10 p-5 bg-orange-400">
      <li v-for="(route, index) in routeData" :key="index">
        <RouterLink :to="route.path">
          {{ route.name }}
        </RouterLink>
      </li>
    </ul>
  </div>

  <RouterView />
</template>
  
<script setup>
import { ref } from 'vue';
import { routes } from '../router/router.js';

const routeData = ref(routes);
</script>

<style lang="scss">
</style>
  