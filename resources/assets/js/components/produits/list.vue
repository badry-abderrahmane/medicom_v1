<template lang="html">
  <table-warper>
    <div class="table-responsive" slot="content">
      <datatable-buttons>
        <tr slot="thead">
          <th width="12%">#ID</th>
          <th width="20%">Nom</th>
          <th width="20%">Fournisseur</th>
          <th>Délais</th>
          <th>Prix | FN</th>
          <th>Prix | HT</th>
          <th width="15%">Action</th>
        </tr>
        <tr slot="tbody" v-for="produit in produits">
          <td>{{ produit.id }}</td>
          <td>{{ produit.name }}</td>
          <td><a @click="$router.push({ path: `/fournisseurs/show/`+produit.fournisseur.id })" class="text-primary btn">{{ produit.fournisseur.name }}</a></td>
          <td><span class="label label-warning">{{ produit.delaisLivraison }}</span></td>
          <td><h5 class="text-success">{{ produit.prixFournisseur | currency('') }}</h5></td>
          <td><h5 class="text-success">{{ produit.prixVente | currency('') }}</h5></td>
          <td>
            <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/produits/show/`+produit.id })"><i class="fa fa-eye"></i></button>
            <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/produits/edit/`+produit.id })"><i class="fa fa-pencil"></i></button>
            <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/produits/delete/`+produit.id })"><i class="fa fa-trash"></i></button>
          </td>
        </tr>
      </datatable-buttons>
    </div>
  </table-warper>
</template>

<script>
export default {
  data(){
    return {
      produits:  [],
    }
  },

  created(){
    axios.get('/produits')
      .then(response => {
        this.produits = response.data;
        Vue.nextTick(function () {
          Event.$emit('init-datatable', 'tableAdd');
        })
    });
  }
}
</script>

<style lang="css">
</style>
