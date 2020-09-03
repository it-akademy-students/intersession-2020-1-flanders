/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
import LoadScript from 'vue-plugin-load-script';
Vue.use(VueRouter, LoadScript);


import Home from './components/HomeComponent.vue';
import GetStarted from './components/GetStartedComponent.vue';
import Donations from './components/DonationsComponent.vue';
import FileView from './components/FileViewComponent.vue';


const routes = [
    { path: '/', component: Home },
    { path: '/GetStarted', component: GetStarted },
    { path: '/Donations', component: Donations },
    { path: '/File', component: FileView }
];

const router = new VueRouter({
    mode:'hash',
    routes
    });
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);



const app = new Vue({
    el: '#app',
    router,
});
