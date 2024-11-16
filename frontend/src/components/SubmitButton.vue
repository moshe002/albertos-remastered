<script setup>

const props = defineProps({
    handleSubmit: {
        type: Function,
        required: true,
    },
});

</script>

<template lang="">
    <button
        @click="handleSubmit"
        type="submit" 
        class="w-28 bg-green-400 p-2 text-center text-white rounded-md">
            SUBMIT
    </button>
</template>

<style lang="">
    
</style>