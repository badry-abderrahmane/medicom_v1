module.exports = {
    routes: [
      { name:'Tableau de bord', path: '/', component: require('./components/dashboard.vue')},
      /**
      **    Caisse routes
      **/
      { path: '/apropos', component: require('./components/apropos.vue')},
      { path: '/support', component: require('./components/support.vue')},

      /**
      **    Clients routes
      **/
      { name:'Clients', path: '/clients', component: require('./components/clients/home.vue')},
      { name:'Détail Client', path: '/clients/show/:id', component: require('./components/clients/show.vue')},
      { name:'Ajout Client', path: '/clients/add', component: require('./components/clients/form.vue')},
      { name:'Modification Client', path: '/clients/edit/:id', component: require('./components/clients/form.vue')},
      { name:'Suppression Client', path: '/clients/delete/:id', component: require('./components/clients/delete.vue')},

      // /**
      // **    Prospects routes
      // **/
      // { name:'Prospects', path: '/prospects', component: require('./components/prospects/home.vue')},
      // { name:'Détail Prospect', path: '/prospects/show/:id', component: require('./components/prospects/show.vue')},
      // { name:'Ajout Prospect', path: '/prospects/add', component: require('./components/prospects/form.vue')},
      // { name:'Modification Prospect', path: '/prospects/edit/:id', component: require('./components/prospects/form.vue')},
      // { name:'Suppression Prospect', path: '/prospects/delete/:id', component: require('./components/prospects/delete.vue')},
      //
      // /**
      // **    Devis routes
      // **/
      // { name:'Devis', path: '/devis', component: require('./components/devis/home.vue')},
      // { name:'Détail Devis', path: '/devis/show/:id', component: require('./components/devis/show.vue')},
      // { name:'Ajout Devis', path: '/devis/add', component: require('./components/devis/form.vue')},
      // { name:'Modification Devis', path: '/devis/edit/:id', component: require('./components/devis/form.vue')},
      // { name:'Suppression Devis', path: '/devis/delete/:id', component: require('./components/devis/delete.vue')},
      //
      // /**
      // **    Commandes routes
      // **/
      // { name:'Commandes', path: '/commandes', component: require('./components/commandes/home.vue')},
      // { name:'Détail Commande', path: '/commandes/show/:id', component: require('./components/commandes/show.vue')},
      // { name:'Ajout Commande', path: '/commandes/add', component: require('./components/commandes/form.vue')},
      // { name:'Modification Commande', path: '/commandes/edit/:id', component: require('./components/commandes/form.vue')},
      // { name:'Suppression Commande', path: '/commandes/delete/:id', component: require('./components/commandes/delete.vue')},
      //
      // /**
      // **    Factures routes
      // **/
      // { name:'Factures', path: '/factures', component: require('./components/factures/home.vue')},
      // { name:'Détail Facture', path: '/factures/show/:id', component: require('./components/factures/show.vue')},
      // { name:'Ajout Facture', path: '/factures/add', component: require('./components/factures/form.vue')},
      // { name:'Modification Facture', path: '/factures/edit/:id', component: require('./components/factures/form.vue')},
      // { name:'Suppression Facture', path: '/factures/delete/:id', component: require('./components/factures/delete.vue')},
      //
      // /**
      // **    Fournisseurs routes
      // **/
      // { name:'Fournisseurs', path: '/fournisseurs', component: require('./components/fournisseurs/home.vue')},
      // { name:'Détail Fournisseur', path: '/fournisseurs/show/:id', component: require('./components/fournisseurs/show.vue')},
      // { name:'Ajout Fournisseur', path: '/fournisseurs/add', component: require('./components/fournisseurs/form.vue')},
      // { name:'Modification Fournisseur', path: '/fournisseurs/edit/:id', component: require('./components/fournisseurs/form.vue')},
      // { name:'Suppression Fournisseur', path: '/fournisseurs/delete/:id', component: require('./components/fournisseurs/delete.vue')},
      //
      // /**
      // **    Produits routes
      // **/
      // { name:'Produits', path: '/produits', component: require('./components/produits/home.vue')},
      // { name:'Détail Produit', path: '/produits/show/:id', component: require('./components/produits/show.vue')},
      // { name:'Ajout Produit', path: '/produits/add', component: require('./components/produits/form.vue')},
      // { name:'Modification Produit', path: '/produits/edit/:id', component: require('./components/produits/form.vue')},
      // { name:'Suppression Produit', path: '/produits/delete/:id', component: require('./components/produits/delete.vue')},
      //
      // /**
      // **    Bon de commandes routes
      // **/
      // { name:'Bon de commandes', path: '/bondecommandes', component: require('./components/bondecommandes/home.vue')},
      // { name:'Détail Bon de commande', path: '/bondecommandes/show/:id', component: require('./components/bondecommandes/show.vue')},
      // { name:'Ajout Bon de commande', path: '/bondecommandes/add', component: require('./components/bondecommandes/form.vue')},
      // { name:'Modification Bon de commande', path: '/bondecommandes/edit/:id', component: require('./components/bondecommandes/form.vue')},
      // { name:'Suppression Bon de commande', path: '/bondecommandes/delete/:id', component: require('./components/bondecommandes/delete.vue')},
      //
      // /**
      // **    Rendez-vous routes
      // **/
      // { name:'Rendez-vous', path: '/rendezvous', component: require('./components/rendezvous/home.vue')},
      // { name:'Détail Rendez-vous', path: '/rendezvous/show/:id', component: require('./components/rendezvous/show.vue')},
      // { name:'Ajout Rendez-vous', path: '/rendezvous/add', component: require('./components/rendezvous/form.vue')},
      // { name:'Modification Rendez-vous', path: '/rendezvous/edit/:id', component: require('./components/rendezvous/form.vue')},
      // { name:'Suppression Rendez-vous', path: '/rendezvous/delete/:id', component: require('./components/rendezvous/delete.vue')},
      //
      // /**
      // **    Visites routes
      // **/
      // { name:'Visites', path: '/visites', component: require('./components/visites/home.vue')},
      // { name:'Détail Visite', path: '/visites/show/:id', component: require('./components/visites/show.vue')},
      // { name:'Ajout Visite', path: '/visites/add', component: require('./components/visites/form.vue')},
      // { name:'Modification Visite', path: '/visites/edit/:id', component: require('./components/visites/form.vue')},
      // { name:'Suppression Visite', path: '/visites/delete/:id', component: require('./components/visites/delete.vue')},


      { name:'Calendrier', path: '/calendrier', component: require('./components/calendrier/home.vue')},
    ]
  }
