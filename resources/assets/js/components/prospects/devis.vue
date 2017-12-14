<template lang="html">
  <datatable-buttons>
    <tr slot="thead">
      <th width="20%">#ID</th>
      <th width="30%">Date</th>
      <th width="30%">Status</th>
      <th width="20%">Action</th>
    </tr>
    <tr slot="tbody" v-for="devi in devis">
      <td>{{ devi.id }}</td>
      <td>{{ devi.created_at }}</td>
      <td>
        <span v-if="devi.status == '1'" class="label label-danger block">En attente</span>
        <span v-if="devi.status == '2'" class="label label-success block">Livré</span>
      </td>
      <td>
        <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/devis/show/`+devi.id })"><i class="fa fa-eye"></i></button>
        <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/devis/edit/`+devi.id })"><i class="fa fa-pencil"></i></button>
        <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/devis/delete/`+devi.id })"><i class="fa fa-trash"></i></button>
      </td>
    </tr>
  </datatable-buttons>
</template>

<script>
export default {
  props:["devis"]
}
</script>

<style lang="css">
</style>
