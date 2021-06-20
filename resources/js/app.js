require("./bootstrap");

window.Vue = require("vue");

import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./components/HomeComponent";
import axios from "axios";
Vue.use(axios);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        }
    ]
});

const app = new Vue({
    el: "#app",
    components: { Home },
    router
});
