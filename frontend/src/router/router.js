import Home from "../pages/Home.vue";
import Menu from "../pages/Menu.vue";
import Order from "../pages/Order.vue";

const routes = [
    { path: '/', component: Home, name: "Home", },
    { path: '/menu', component: Menu, name: "Menu", },
    { path: '/order', component: Order, name: "Order", },
];

export default routes;