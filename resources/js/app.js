

require('./bootstrap');

window.Vue = require('vue');

import VueAxios from 'vue-axios'
import axios from 'axios';
Vue.use(VueAxios,axios);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('persons-component', require('./components/PersonsComponent.vue').default);


const app = new Vue({
    el: '#app'
});

$(function () {
    $('div.alert').delay(10000).slideUp(300);
    $('ul.alert').delay(10000).slideUp(300);
});
