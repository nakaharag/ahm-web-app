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
import moment from "moment";

// Set Vue globally
window.Vue = Vue
// Set Vue router
Vue.router = router
Vue.use(VueRouter)
// Set Vue authentication
Vue.use(VueAxios, axios)

window.moment = moment

Vue.config.productionTip = false

Vue.filter('moment', function (value) {
  return moment(value).format('DD/MM/YYYY')
})


Vue.filter('format-thousands', function (value) {
  // https://stackoverflow.com/a/2901298
  return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
});

axios.defaults.baseURL = `${process.env.MIX_APP_URL}/api`
Vue.use(VueAuth, auth)
// Load Index
Vue.component('index', Index)
const app = new Vue({
  el: '#app',
  router,
  components:{
    moment
  }
});