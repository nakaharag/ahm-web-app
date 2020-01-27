import 'es6-promise/auto'
import axios from 'axios'
import './bootstrap'
import Vue from 'vue'
import VueAuth from '@websanova/vue-auth'
import VueAxios from 'vue-axios'
import VueRouter from 'vue-router'
import VueTheMask from 'vue-the-mask'
import Index from './Index'
import auth from './auth'
import router from './router'
import moment from "moment";
import DatePicker from 'vue2-datepicker';
import VueNumericInput from 'vue-numeric-input';


// Set Vue globally
window.Vue = Vue
// Set Vue router
Vue.router = router
Vue.use(VueRouter)
// Set Vue authentication
Vue.use(VueAxios, axios)

Vue.use(VueTheMask)

Vue.use(DatePicker)
window.moment = moment

Vue.config.productionTip = false


 
Vue.use(VueNumericInput)

Vue.filter('moment', function (value) {
  return moment(value).format('DD/MM/YYYY')
})

Vue.filter('mes', function (value) {
  moment.locale('pt-br');
  return moment(value).format('MMMM')
})

Vue.filter('format-thousands', function (value) {
  // https://stackoverflow.com/a/2901298
  return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
});

axios.defaults.baseURL = `http://127.0.0.1:8000/api`
//axios.defaults.baseURL = `${process.env.MIX_APP_URL}/api`

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