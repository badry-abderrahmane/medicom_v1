
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
require('./plugins');

require('./lists');
require('./infos');

window.Event = new Vue();

import { routes } from './router.js';
const router = new VueRouter({ routes });

Vue.component('full-app', require('./components/home.vue'));
Vue.filter('currencyDisplay', {
    // model -> view
    read: function (val) {
        if (val > 0) {
            return accounting.formatMoney(val, "$", 2, ".", ",");
        }
    },
    // view -> model
    write: function (val, oldVal) {
        return accounting.unformat(val, ",");
    }
});

Vue.directive('sortable', {
    twoWay: true,
    deep: true,
    bind: function () {
        var that = this;

        var options = {
            draggable: Object.keys(this.modifiers)[0]
        };

        this.sortable = Sortable.create(this.el, options);
        console.log('sortable bound!')

        this.sortable.option("onUpdate", function (e) {
            that.value.splice(e.newIndex, 0, that.value.splice(e.oldIndex, 1)[0]);
        });

        this.onUpdate = function(value) {
            that.value = value;
        }
    },
    update: function (value) {
        this.onUpdate(value);
    }
});

const app = new Vue({
  store,
  router,
  data(){
    return {

    }
  },
  created(){
    Event.$on('init-datatable', (tableid) => {
      this.datatableThis(tableid);
    });
  },
  methods:{
    /**
    * DataTables Functions
    *
    **/
    datatableThis(tableid){
      $('#datatable').DataTable({
        "bDestroy": true,
        dom: 'Bfrtip',
        buttons: [
           'excel', 'pdf',
           // { extend: 'pageLength', text:'Nombre de lignes'},
           { extend: 'print', text:'<i class="fa fa-print"></i>'}
        ],
        "language": {
              "lengthMenu": "Afficher _MENU_ lignes par page",
              "sSearch":         "Recherche&nbsp;:",
              "zeroRecords": "Aucun enregistrement pour le moment. ",
              "info": "Page _PAGE_ de _PAGES_",
              "infoEmpty": "Pas d'enregistrement.",
              "infoFiltered": "( _MAX_ enregistrements filtrés)",
              "oPaginate": {
                  "sFirst":      "Premier",
                  "sPrevious":   "Pr&eacute;c&eacute;dent",
                  "sNext":       "Suivant",
                  "sLast":       "Dernier"
              },
          }
      });
      //this.loadTooltips();
    },
  }
}).$mount('#app');
