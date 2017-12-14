<template lang="html">
  <div class="table-responsive" slot="content">
    <datatable-buttons>
      <tr slot="thead">
        <th width="20%">#ID</th>
        <th width="30%">Date</th>
        <th width="30%">Status</th>
        <th width="20%">Action</th>
      </tr>
      <tr slot="tbody" v-for="visite in visites">
        <td>{{ visite.id }}</td>
        <td>{{ visite.date }}</td>
        <td>
          <span v-if="visite.status == '1'" class="label label-danger block">En attente</span>
          <span v-if="visite.status == '2'" class="label label-success block">Passé</span>
        </td>
        <td>
          <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/visites/show/`+visite.id })"><i class="fa fa-eye"></i></button>
          <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/visites/edit/`+visite.id })"><i class="fa fa-pencil"></i></button>
          <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/visites/delete/`+visite.id })"><i class="fa fa-trash"></i></button>
        </td>
      </tr>
    </datatable-buttons>
  </div>
</template>

<script>
export default {
  props:["visites"],
  mounted(){
    
  }
}
</script>

<style lang="css">
</style>
