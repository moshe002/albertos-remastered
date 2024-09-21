<script setup>

</script>

<template lang="">
    <div>
        <h1>Order here!</h1>
        <form>
            <div>
                <label>Date:</label>
                <input type="datetime" id="date_ordered" name="date_ordered" required />
            </div>
            <div>
                <label>Instruction/Message:</label>
                <input type="text" id="instruction" name="instruction" required />
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