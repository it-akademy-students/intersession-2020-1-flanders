/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import Home from './components/HomeComponent.vue';
import Example from './components/ExampleComponent.vue';
import Dons from './components/DonsComponent.vue';


const routes = [
    { path: '/', component: Home },
    { path: '/example', component: Example },
    { path: '/dons', component: Dons }
];

const router = new VueRouter({routes});
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);



const app = new Vue({
    el: '#app',
    router,
});
