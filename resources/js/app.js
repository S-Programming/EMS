require('./bootstrap');
window.Vue = require('vue');

import App from './App.vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import {routes} from './routes';
import {store} from './store/index'

Vue.use(VueRouter);
//Vue.use(VueAxios, axios);

const router = new VueRouter({
    mode: 'history',
    routes: routes
});
store.dispatch('attempt',localStorage.getItem('token')).then(() => {
    const app = new Vue({
        el: '#app',
        router: router,
        store:store,
        render: h => h(App),
    });
})
