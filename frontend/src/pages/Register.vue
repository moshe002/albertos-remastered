<script setup>
import { useRouter } from 'vue-router';
import RegisterForm from '../components/register/RegisterForm.vue';

const router = useRouter();

const goToLogin = () => router.push({ path: '/login' });

</script>

<template>
    <div class="flex flex-col gap-5 items-center pt-28 pb-5 h-full"> 
        <h1>Register Here</h1>
        <RegisterForm />
        <section>
            <button @click="goToLogin">Already have an account? Login here...</button>
        </section>
    </div>
</template>

<style>
    
</style>