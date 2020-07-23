import 'es6-promise/auto'
import axios from 'axios'
import './bootstrap'
import Vue from 'vue'
import VueAuth from '@websanova/vue-auth'
import VueAxios from 'vue-axios'
import VueRouter from 'vue-router'
import Index from './Index'
import auth from './auth'
import router from './router'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import '@mdi/font/css/materialdesignicons.css'
import { store } from './store'
// Set Vue globally
window.Vue = Vue

// Set Vue router
Vue.router = router
Vue.use(VueRouter)
Vue.use(Vuetify)

// Set Vue authentication
Vue.use(VueAxios, axios)
axios.defaults.baseURL = `${process.env.MIX_APP_URL}/api`
Vue.use(VueAuth, auth)

// Load Index
Vue.component('index', Index)

const app = new Vue({
  el: '#app',
  store,
  router,
  vuetify: new Vuetify(),
  icons: {
    iconfont: 'mdi',
  },
});
