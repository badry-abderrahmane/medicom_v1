
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
import { store } from './store';
import Vue2Filters from 'vue2-filters'

Vue.use(Vue2Filters)
Vue.use(VueRouter);

require('./global');
require('./parts');
require('./plugins');

require('./lists');
require('./infos');

window.Event = new Vue();

import { routes } from './router.js';
const router = new VueRouter({ routes });

Vue.component('full-app', require('./components/home.vue'));

const app = new Vue({
  store,
  router,
  mounted(){
    this.$store.dispatch('LOAD_PROSPECT_LIST')
    this.$store.dispatch('LOAD_FOURNISSEUR_LIST')
    this.$store.dispatch('LOAD_CLIENT_LIST')
    this.$store.dispatch('LOAD_CATEGORY_LIST')
    this.$store.dispatch('LOAD_PRODUIT_LIST')
    this.$store.dispatch('LOAD_PRODUIT_PRIX')
  },
  created(){
    Event.$on('init-datatable', (tableid) => {
      this.datatableThis(tableid);
    });
    Event.$on('publish-success-message', (message) => {
      this.notifSuccess(message);
    });
    Event.$on('publish-info-message', (message) => {
      this.notifInfo(message);
    });
    Event.$on('publish-warning-message', (message) => {
      this.notifWarning(message);
    });
    Event.$on('publish-danger-message', (message) => {
      this.notifDanger(message);
    });

    Event.$on('refresh-clients', () => {
      this.getClients();
    });
    Event.$on('refresh-fournisseurs', () => {
      this.getFournisseurs();
    });
    Event.$on('refresh-prospects', () => {
      this.getProspects();
    });
    Event.$on('refresh-categories', () => {
      this.getCategories();
    });

  },
  methods:{
    /**
    * Notif Functions
    *
    **/
    notifSuccess(message){
      $.toast().reset('all');
  		$("body").removeAttr('class');
  		$.toast({
              heading: message,
              text: '',
              position: 'top-right',
              loaderBg:'#fec107',
              icon: 'success',
              hideAfter: 3500,
              stack: 6
            });
  		return false;
    },
    notifWarning(message){
      $.toast().reset('all');
  		$("body").removeAttr('class');
  		$.toast({
              heading: message,
              text: '',
              position: 'top-right',
              loaderBg:'#ff2a00',
              icon: 'warning',
              hideAfter: 3500,
              stack: 6
            });
  		return false;
    },
    notifInfo(message){
      $.toast().reset('all');
  		$("body").removeAttr('class');
  		$.toast({
              heading: message,
              text: '',
              position: 'top-right',
              loaderBg:'#fec107',
              icon: 'info',
              hideAfter: 3000,
              stack: 6
            });
  		return false;
    },
    notifDanger(message){
      $.toast().reset('all');
  		$("body").removeAttr('class');
  		$.toast({
              heading: message,
              text: '',
              position: 'top-right',
              loaderBg:'#fec107',
              icon: 'error',
              hideAfter: 3500
            });
  		return false;
    },
    /**
    * DataTables Functions
    *
    **/
    datatableThis(tableid){
      $('table.display').DataTable({
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
