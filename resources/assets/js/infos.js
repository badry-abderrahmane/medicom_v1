/*
*
* Infos components
*
*/
Vue.component('infos-client', require('./components/clients/infos.vue'));
Vue.component('infos-client-visites', require('./components/clients/visites.vue'));
Vue.component('infos-client-commandes', require('./components/clients/commandes.vue'));
Vue.component('infos-client-factures', require('./components/clients/factures.vue'));


Vue.component('infos-prospect', require('./components/prospects/infos.vue'));
Vue.component('infos-prospect-rendezvous', require('./components/prospects/rendezvous.vue'));
Vue.component('infos-prospect-devis', require('./components/prospects/devis.vue'));

// Vue.component('infos-devis', require('./components/devis/infos.vue'));
// Vue.component('infos-commande', require('./components/commandes/infos.vue'));
// Vue.component('infos-facture', require('./components/factures/infos.vue'));
Vue.component('infos-fournisseur', require('./components/fournisseurs/infos.vue'));
Vue.component('infos-fournisseur-produits', require('./components/fournisseurs/produits.vue'));
Vue.component('infos-fournisseur-bondecommandes', require('./components/fournisseurs/bondecommandes.vue'));

Vue.component('infos-category', require('./components/categories/infos.vue'));
Vue.component('infos-category-produits', require('./components/categories/produits.vue'));
// Vue.component('infos-produit', require('./components/produits/infos.vue'));
// Vue.component('infos-bondecommande', require('./components/bondecommandes/infos.vue'));
// Vue.component('infos-rendezvous', require('./components/rendezvous/infos.vue'));
// Vue.component('infos-visite', require('./components/visites/infos.vue'));
