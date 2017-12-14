<template lang="html">
  <datatable-buttons>
    <tr slot="thead">
      <th width="20%">#ID</th>
      <th width="30%">Date</th>
      <th width="30%">Status</th>
      <th width="20%">Action</th>
    </tr>
    <tr slot="tbody" v-for="facture in factures">
      <td>{{ facture.id }}</td>
      <td>{{ facture.created_at }}</td>
      <td>
        <span v-if="facture.status == '1'" class="label label-danger block">En attente</span>
        <span v-if="facture.status == '2'" class="label label-warning block">Non Payée</span>
        <span v-if="facture.status == '3'" class="label label-success block">Payée</span>
      </td>
      <td>
        <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/factures/show/`+facture.id })"><i class="fa fa-eye"></i></button>
        <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/factures/edit/`+facture.id })"><i class="fa fa-pencil"></i></button>
        <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/factures/delete/`+facture.id })"><i class="fa fa-trash"></i></button>
      </td>
    </tr>
  </datatable-buttons>
</template>

<script>
export default {
  props:["factures"]
}
</script>

<style lang="css">
</style>
