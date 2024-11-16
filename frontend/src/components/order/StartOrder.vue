<script setup>
import SubmitButton from '../SubmitButton.vue';
import MenuItems from '../menu/MenuItems.vue';
import { useRoute } from 'vue-router';
import { computed } from 'vue';

const props = defineProps({
    orderState: {
        type: Boolean,
        required: true,
        default: false,
    },
});

// const currentPath = computed(() => route.path);

const emit = defineEmits(['updateOrderState']);

const handleSubmit = () => {
    emit('updateOrderState', true);
};

</script>

<template lang="">
    <div class="flex flex-col justify-center items-center p-3 h-full">
        <div class="text-center mb-10">
            <h1>Order here!</h1>
            <span class="opacity-60 text-xs">1st step!</span>
        </div>
        <form class="flex flex-col items-center text-center gap-5 p-3 border-2 border-green-400" @submit.prevent="handleSubmit">
            <div class="flex flex-col border-2">
                <label>Date:</label>
                <input type="datetime-local" id="date_ordered" name="date_ordered" required />
            </div>
            <div class="flex flex-col border-2">
                <label>Instruction/Message:</label>
                <textarea
                    cols="30"
                    rows="5" 
                    id="instruction" 
                    name="instruction"
                    class="border-2"
                    required
                ></textarea>
            </div>
            <!---
                also pass customer_id
            -->
            <SubmitButton />
        </form>
    </div>
    <!---
        <MenuItems />
    -->
</template>

<style lang="">
    
</style>