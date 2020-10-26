// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import Router from './routes.js'
import * as VeeValidate from 'vee-validate';
import VueResource from 'vue-resource';

Vue.use(VeeValidate );
Vue.use(VueResource);


Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  el: '#app',
  components: { App },
  template: '<App/>',
  router:Router
 
})
