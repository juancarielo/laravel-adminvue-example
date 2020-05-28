import Vue from 'vue'
import App from './App.vue'
import router from './router'

// todo: refactor this jquery
try {
  //window.Popper = require('popper.js').default;
  //window.$ = window.jQuery = require('jquery');

  require('jquery')
  require('popper.js')
  require('bootstrap');
  require('startbootstrap-sb-admin-2/js/sb-admin-2.min')
} catch (e) {
}

// Vue.config.performance = true

const app = new Vue({
  el: '#app',
  router,
  template: '<App/>',
  components: {
    App
  },
})
