<template lang="">
    <div>
        <h1>menu page</h1>
    </div>
</template>
<script setup>
import { ref } from 'vue';
/**
 * TODO:
 * 
 * display fetched items in page
 * create UI
 * learn axios
 * 
 */
    // http://127.0.0.1:8000/api/menu
    try {
        fetch(`http://127.0.0.1:8000/api/menu`)
        .then(res => res.json())
        .then(data => { console.log(data) })
    } catch (e) {
        console.error(`Error fetching data: ${e}`)
    }

</script>
<style lang="">
    
</style>