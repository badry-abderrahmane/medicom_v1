module.exports = {
    routes: [
      { path: '/', component: require('./components/dashboard.vue')},
      /**
      **    Caisse routes
      **/
      { path: '/apropos', component: require('./components/apropos.vue')},
      { path: '/support', component: require('./components/support.vue')},

      { path: '/clients', component: require('./components/clients/home.vue')},
      { path: '/prospects', component: require('./components/prospects/home.vue')},
      { path: '/devis', component: require('./components/devis/home.vue')},
      { path: '/commandes', component: require('./components/commandes/home.vue')},
      { path: '/factures', component: require('./components/factures/home.vue')},
      { path: '/fournisseurs', component: require('./components/fournisseurs/home.vue')},
      { path: '/produits', component: require('./components/produits/home.vue')},
      { path: '/bondecommandes', component: require('./components/bondecommandes/home.vue')},
      { path: '/rendezvous', component: require('./components/rendezvous/home.vue')},
      { path: '/visites', component: require('./components/visites/home.vue')},
      { path: '/calendrier', component: require('./components/calendrier/home.vue')},


    ]
  }
