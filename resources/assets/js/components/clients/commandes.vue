<template lang="html">
  <datatable-buttons>
    <tr slot="thead">
      <th width="20%">#ID</th>
      <th width="30%">Date</th>
      <th width="30%">Status</th>
      <th width="20%">Action</th>
    </tr>
    <tr slot="tbody" v-for="commande in commandes">
      <td>{{ commande.id }}</td>
      <td>{{ commande.created_at }}</td>
      <td>
        <span v-if="commande.status == '1'" class="label label-danger block">En attente</span>
        <span v-if="commande.status == '2'" class="label label-success block">Livré</span>
      </td>
      <td>
        <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/commandes/show/`+commande.id })"><i class="fa fa-eye"></i></button>
        <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/commandes/edit/`+commande.id })"><i class="fa fa-pencil"></i></button>
        <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/commandes/delete/`+commande.id })"><i class="fa fa-trash"></i></button>
      </td>
    </tr>
  </datatable-buttons>
</template>

<script>
export default {
  props:["commandes"]
}
</script>

<style lang="css">
</style>
