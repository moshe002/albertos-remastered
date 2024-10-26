<script setup>

const formElementValues = [
    { id: 'name', type: 'text', placeholder: 'Enter your fullname' },
    { id: 'password', type: 'password', placeholder: 'Enter your password' },
];

const handleLogin = () => {

};

</script>

<template>
    <div class="border-2 border-black p-10">
        <form @submit="handleLogin">
            <div
                class="flex flex-col justify-evenly p-5" 
                v-for="(values, index) in formElementValues"
            >
                <input 
                    :type="values.type" 
                    :id="values.id" 
                    :key="index"
                    :placeholder="values.placeholder" 
                />
            </div>
            <button class="" type="submit">LOGIN</button>
        </form>
    </div>
</template>

<style lang="">
    
</style>