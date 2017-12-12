<template lang="html">
  <table-warper>
    <div class="table-responsive" slot="content">
      <datatable-buttons>
        <tr slot="thead">
          <th width="12%">#ID</th>
          <th>Type</th>
          <th width="30%">Date</th>
          <th>Prospect</th>
          <th>Status</th>
          <th width="15%">Action</th>
        </tr>
        <tr slot="tbody" v-for="visite in visites">
          <td>{{ visite.id }}</td>
          <td>
            <span v-if="visite.type == '0'" class="label label-default block">Faible</span>
            <span v-if="visite.type == '1'" class="label label-warning block">Moyenne</span>
            <span v-if="visite.type == '2'" class="label label-danger block">Haute</span>

          </td>
          <td>{{ visite.date }}</td>
          <td>{{ visite.client.name }}</td>
          <td>
            <span v-if="visite.status" class="label label-success block">Visité</span>
            <span v-else class="label label-danger block">En attente</span>
          </td>
          <td>
            <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/visites/show/`+visite.id })"><i class="fa fa-eye"></i></button>
            <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/visites/edit/`+visite.id })"><i class="fa fa-pencil"></i></button>
            <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/visites/delete/`+visite.id })"><i class="fa fa-trash"></i></button>
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
      visites:  [
        { id: '1', date: '12-03-2017', client:{ name: 'Adil'}, type: '0', status: 0},
        { id: '2', date: '12-03-2017', client:{ name: 'Adil'}, type: '1', status: 0},
        { id: '3', date: '12-03-2017', client:{ name: 'Adil'}, type: '2', status: 1},
      ],
    }
  }
}
</script>

<style lang="css">
</style>
