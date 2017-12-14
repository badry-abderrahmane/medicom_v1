<template lang="html">
  <datatable-buttons>
    <tr slot="thead">
      <th width="20%" style="text-align: center;">#ID</th>
      <th width="30%" style="text-align: center;">Date</th>
      <th width="30%" style="text-align: center;">Status</th>
      <th width="20%" style="text-align: center;">Action</th>
    </tr>
    <tr slot="tbody" v-for="bondecommande in bondecommandes">
      <td style="text-align: center;">{{ bondecommande.id }}</td>
      <td style="text-align: center;">{{ bondecommande.created_at }}</td>
      <td style="text-align: center;">
        <span v-if="bondecommande.status == '1'" class="label label-danger block">En attente</span>
        <span v-if="bondecommande.status == '2'" class="label label-success block">Livré</span>
      </td>
      <td>
        <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/bondecommandes/show/`+bondecommande.id })"><i class="fa fa-eye"></i></button>
        <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/bondecommandes/edit/`+bondecommande.id })"><i class="fa fa-pencil"></i></button>
        <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/bondecommandes/delete/`+bondecommande.id })"><i class="fa fa-trash"></i></button>
      </td>
    </tr>
  </datatable-buttons>
</template>

<script>
export default {
  props:["bondecommandes"]
}
</script>

<style lang="css">
</style>
