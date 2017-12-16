
import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({
  state: {
    prospects: [],
    fournisseurs: [],
    clients: [],
    categories: [],
    produits: [],
    produitsprix: [],
  },
  mutations: {
    SET_PROSPECT_LIST: (state, { list }) => {
      let array = [];var empty = {};empty['text'] = '';empty['value'] = '';array.push(empty);
      for (var prop in list) {let item = {};item['text'] = list[prop];item['value'] = prop;array.push(item);}
      state.prospects = array
    },
    SET_FOURNISSEUR_LIST: (state, { list }) => {
      let array = [];var empty = {};empty['text'] = '';empty['value'] = '';array.push(empty);
      for (var prop in list) {let item = {};item['text'] = list[prop];item['value'] = prop;array.push(item);}
      state.fournisseurs = array
    },
    SET_CLIENT_LIST: (state, { list }) => {
      let array = [];var empty = {};empty['text'] = '';empty['value'] = '';array.push(empty);
      for (var prop in list) {let item = {};item['text'] = list[prop];item['value'] = prop;array.push(item);}
      state.clients = array
    },
    SET_CATEGORY_LIST: (state, { list }) => {
      let array = [];var empty = {};empty['text'] = '';empty['value'] = '';array.push(empty);
      for (var prop in list) {let item = {};item['text'] = list[prop];item['value'] = prop;array.push(item);}
      state.categories = array
    },
    SET_PRODUIT_LIST: (state, { list }) => {
      let array = [];var empty = {};empty['text'] = '';empty['value'] = '';array.push(empty);
      for (var prop in list) {let item = {};item['text'] = list[prop];item['value'] = prop;array.push(item);}
      state.produits = array
    },
    SET_PRODUIT_PRIX: (state, { list }) => {
      let array = [];var empty = {};empty['text'] = '';empty['value'] = '';array.push(empty);
      for (var prop in list) {let item = {};item['text'] = list[prop];item['value'] = prop;array.push(item);}
      state.produitsprix = array
    }
  },
  actions: {
    LOAD_PROSPECT_LIST: function ({ commit }) {
      axios.get('list/prospects').then((response) => {
        commit('SET_PROSPECT_LIST', { list: response.data })
      }, (err) => {
        console.log(err)
      })
    },

    LOAD_FOURNISSEUR_LIST: function ({ commit }) {
      axios.get('list/fournisseurs').then((response) => {
        commit('SET_FOURNISSEUR_LIST', { list: response.data })
      }, (err) => {
        console.log(err)
      })
    },

    LOAD_CLIENT_LIST: function ({ commit }) {
      axios.get('list/clients').then((response) => {
        commit('SET_CLIENT_LIST', { list: response.data })
      }, (err) => {
        console.log(err)
      })
    },

    LOAD_CATEGORY_LIST: function ({ commit }) {
      axios.get('list/categories').then((response) => {
        commit('SET_CATEGORY_LIST', { list: response.data })
      }, (err) => {
        console.log(err)
      })
    },

    LOAD_PRODUIT_LIST: function ({ commit }) {
      axios.get('list/produits').then((response) => {
        commit('SET_PRODUIT_LIST', { list: response.data })
      }, (err) => {
        console.log(err)
      })
    },

    LOAD_PRODUIT_PRIX: function ({ commit }) {
      axios.get('prix/produits').then((response) => {
        commit('SET_PRODUIT_PRIX', { list: response.data })
      }, (err) => {
        console.log(err)
      })
    }
  }
});
