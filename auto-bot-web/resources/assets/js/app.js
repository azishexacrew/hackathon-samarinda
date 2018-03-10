require('./bootstrap');

window.Vue = require('vue');

import Vuetify from 'vuetify'
import VueRouter from 'vue-router'

Vue.use(Vuetify)
Vue.use(VueRouter)
// Vue.component('app-tool', require('./components/layout/ToolBar.vue'));

let appHome = require('./components/layout/Home.vue');
let AppTool = require('./components/layout/ToolBar.vue');
let appLogin = require('./components/login/Login.vue');
let appMap = require('./components/map/Map.vue');
let appLaporan = require('./components/laporan/Laporan.vue');
let appPerson = require('./components/person/person.vue');


const routes = [
    { path: '/', component: appHome },
    { path: '/map', component: appMap },
    { path: '/laporan', component: appLaporan },
    { path: '/person', component: appPerson }
]

const router = new VueRouter({
    routes 
  });


const app = new Vue({
    router,
    el: '#app',
    components:{
        appHome,AppTool,appLogin,appMap
    }
});
