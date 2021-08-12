import Vue from 'vue';
import router from './router';
import App from './components/App.vue';
import "tailwindcss/tailwind.css";
import BootstrapVue from 'bootstrap-vue';


require('./bootstrap');


Vue.use(BootstrapVue)

const app = new Vue({
    el: '#app',
    components: {
        App       
    },
    router,
});
window.Vue = require('vue').default;
