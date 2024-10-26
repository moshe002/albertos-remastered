<script setup>
import { useRouter } from 'vue-router';
import LoginForm from '../components/login/LoginForm.vue';

const router = useRouter();

const goToRegister = () => router.push({ path: '/register' });

</script>

<template>
    <div class="flex flex-col gap-5 items-center pt-28 pb-5 h-screen">
        <h1>Login Here</h1>
        <LoginForm />
        <section>
            <button @click="goToRegister">No account? register here...</button>
        </section>
    </div>
</template>

<style>
    
</style>