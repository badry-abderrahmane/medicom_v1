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
          <td>{{ produit.fournisseur.name }}</td>
          <td>{{ produit.delaisLivraison }}</td>
          <td>{{ produit.prixFournisseur }}</td>
          <td>{{ produit.prixVente }}</td>
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
