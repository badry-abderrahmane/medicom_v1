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
        <tr slot="tbody" v-for="rendezvou in rendezvous">
          <td>{{ rendezvou.id }}</td>
          <td>
            <span v-if="rendezvou.type == '1'" class="label label-default block">Faible</span>
            <span v-if="rendezvou.type == '2'" class="label label-warning block">Moyenne</span>
            <span v-if="rendezvou.type == '3'" class="label label-danger block">Haute</span>

          </td>
          <td>{{ rendezvou.date }}</td>
          <td>{{ rendezvou.prospect.name }}</td>
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
    </div>
  </table-warper>
</template>

<script>
export default {
  data(){
    return {
      rendezvous:  [],
    }
  },

  created(){
    axios.get('/rendezvous')
      .then(response => {
        this.rendezvous = response.data;
        Vue.nextTick(function () {
          Event.$emit('init-datatable', 'tableAdd');
        })
    });
  }
}
</script>

<style lang="css">
</style>
