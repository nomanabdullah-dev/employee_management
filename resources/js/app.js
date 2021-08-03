require('./bootstrap');
import Vue from 'vue'
import VueRouter from 'vue-router'
import { routes } from './routes'


Vue.use(VueRouter)
window.Vue = require('vue').default;
Vue.component('employees-index', require('./components/employees/Index.vue').default);


const router = new VueRouter({
    mode: 'history',
    routes: routes
})



const app = new Vue({
    el: '#app',
    router: router
});
