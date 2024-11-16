// router.js
import { createWebHistory, createRouter } from 'vue-router';
import Home from "../pages/Home.vue";
import Menu from "../pages/Menu.vue";
import Order from "../pages/Order.vue";
import Login from '../pages/Login.vue';
import Register from '../pages/Register.vue';

export const routes = [
    { path: '/', component: Home, name: "Home", icon: "hi-home" },
    { path: '/menu', component: Menu, name: "Menu", icon: "md-menubook-round" },
    { path: '/order', component: Order, name: "Order", icon: "bi-card-list", props: true, },
    { path: '/login', component: Login, name: "Login" },
    { path: '/register', component: Register, name: "Register" }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
