<template lang="html">
  <table-warper>
    <div class="table-responsive" slot="content">
      <datatable-buttons>
        <tr slot="thead">
          <th width="12%">#ID</th>
          <th width="20%">Nom</th>
          <th width="10%">Spécialité</th>
          <th width="10%">Produits</th>
          <th>Telephone</th>
          <th>Adresse</th>
          <th width="15%">Action</th>
        </tr>
        <tr slot="tbody" v-for="fournisseur in fournisseurs">
          <td>{{ fournisseur.id }}</td>
          <td>{{ fournisseur.name }}</td>
          <td>{{ fournisseur.specialite }}</td>
          <td>{{ fournisseur.produits.count }}</td>
          <td>{{ fournisseur.phone }}</td>
          <td>{{ fournisseur.adress }}</td>
          <td>
            <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/fournisseurs/show/`+fournisseur.id })"><i class="fa fa-eye"></i></button>
            <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/fournisseurs/edit/`+fournisseur.id })"><i class="fa fa-pencil"></i></button>
            <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/fournisseurs/delete/`+fournisseur.id })"><i class="fa fa-trash"></i></button>
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
      fournisseurs:  [],
    }
  },

  created(){
    axios.get('/fournisseurs')
      .then(response => {
        this.fournisseurs = response.data;
        Vue.nextTick(function () {
          Event.$emit('init-datatable', 'tableAdd');
        })
    });
  }
}
</script>

<style lang="css">
</style>
