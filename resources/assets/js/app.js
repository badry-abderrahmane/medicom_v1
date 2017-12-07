
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
import Vuex from 'vuex'

Vue.use(Vuex)
Vue.use(VueRouter);

const store = new Vuex.Store({
  state: {
    pagetitle: 'Blank',
    banqueCustom:[],
  },
  getters: {
    pagetitle: state => {
      return state.pagetitle
    },
    banqueCustom: state => {
      return state.banqueCustom
    }
  },
  mutations: {
    pagetitle (state,title) {
      state.pagetitle = title;
    },
    banqueCustom (state,banque) {
      state.banqueCustom = banque;
    }
  }
})

// require('./store');
require('./global');
require('./parts');

window.Event = new Vue();

import { routes } from './router.js';
const router = new VueRouter({ routes });

Vue.component('full-app', require('./components/home.vue'));

const app = new Vue({
  store,
  router,
  data(){
    return {

    }
  }
}).$mount('#app');
