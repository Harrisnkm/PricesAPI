

require('./bootstrap');

window.Vue = require('vue');


import Vue from 'vue';
import axios from 'axios';
import PricesApi from './components/PricesApi';


window.axios = axios;

const app = new Vue({
    el: '#app',
    components: {
        PricesApi
    }

});
