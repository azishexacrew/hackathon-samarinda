require('./bootstrap');

window.Vue = require('vue');
import Vuetify from 'vuetify'
 
Vue.use(Vuetify)

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('login-component', require('./components/login/Login.vue'));


const app = new Vue({
    el: '#app'
});
