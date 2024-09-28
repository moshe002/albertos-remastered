// router.js
import { createMemoryHistory, createRouter } from 'vue-router';
import Home from "../pages/Home.vue";
import Menu from "../pages/Menu.vue";
import Order from "../pages/Order.vue";

export const routes = [
    { path: '/', component: Home, name: "Home", icon: "hi-home" },
    { path: '/menu', component: Menu, name: "Menu", icon: "md-menubook-round" },
    { path: '/order', component: Order, name: "Order", icon: "bi-card-list", props: true, },
];

const router = createRouter({
    history: createMemoryHistory(),
    routes,
});

export default router;
