<script setup>
const props = defineProps({
    orderState: {
        type: Boolean,
        required: true,
        default: false,
    },
});

const emit = defineEmits(['updateOrderState']);

const handleSubmit = () => {
    emit('updateOrderState', true);
};

</script>

<template lang="">
    <div>
        <h1>Order here!</h1>
        <form @submit.prevent="handleSubmit">
            <div>
                <label>Date:</label>
                <input type="datetime-local" id="date_ordered" name="date_ordered" required />
            </div>
            <div>
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
            <button type="submit" class="">SUBMIT</button>
        </form>
    </div>
</template>

<style lang="">
    
</style>