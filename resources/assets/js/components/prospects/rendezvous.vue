<template lang="html">
  <datatable-buttons>
    <tr slot="thead">
      <th width="20%">#ID</th>
      <th width="30%">Date</th>
      <th width="30%">Status</th>
      <th width="20%">Action</th>
    </tr>
    <tr slot="tbody" v-for="rendezvou in rendezvous">
      <td>{{ rendezvou.id }}</td>
      <td>{{ rendezvou.date }}</td>
      <td>
        <span v-if="rendezvou.status == '1'" class="label label-danger block">En attente</span>
        <span v-if="rendezvou.status == '2'" class="label label-success block">Passé</span>
      </td>
      <td>
        <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/rendezvous/show/`+rendezvou.id })"><i class="fa fa-eye"></i></button>
        <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/rendezvous/edit/`+rendezvou.id })"><i class="fa fa-pencil"></i></button>
        <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/rendezvous/delete/`+rendezvou.id })"><i class="fa fa-trash"></i></button>
      </td>
    </tr>
  </datatable-buttons>
</template>

<script>
export default {
  props:["rendezvous"]
}
</script>

<style lang="css">
</style>
