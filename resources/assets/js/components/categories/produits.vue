<template lang="html">
  <datatable-buttons>
    <tr slot="thead">
      <th width="10%">#ID</th>
      <th width="30%">Nom</th>
      <th width="20%">Délais</th>
      <th width="20%">Prix | FN</th>
      <th width="20%">Action</th>
    </tr>
    <tr slot="tbody" v-for="produit in produits">
      <td>{{ produit.id }}</td>
      <td>{{ produit.name }}</td>
      <td>{{ produit.delaisLivraison }}</td>
      <td>{{ produit.prixFournisseur }}</td>
      <td>
        <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/produits/show/`+produit.id })"><i class="fa fa-eye"></i></button>
        <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/produits/edit/`+produit.id })"><i class="fa fa-pencil"></i></button>
        <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/produits/delete/`+produit.id })"><i class="fa fa-trash"></i></button>
      </td>
    </tr>
  </datatable-buttons>
</template>

<script>
export default {
  props:["produits"]
}
</script>

<style lang="css">
</style>
