<template lang="html">
  <table-warper>
    <div class="table-responsive" slot="content">
      <datatable-buttons>
        <tr slot="thead">
          <th width="12%">#ID</th>
          <th width="30%">Nom</th>
          <th>Telephone</th>
          <th>Adresse</th>
          <th>Activité</th>
          <th width="15%">Action</th>
        </tr>
        <tr slot="tbody" v-for="client in clients">
          <td>{{ client.id }}</td>
          <td>{{ client.name }}</td>
          <td>{{ client.phone }}</td>
          <td>{{ client.adress }}</td>
          <td>{{ client.activite }}</td>
          <td>
            <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/clients/show/`+client.id })"><i class="fa fa-eye"></i></button>
            <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/clients/edit/`+client.id })"><i class="fa fa-pencil"></i></button>
            <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/clients/delete/`+client.id })"><i class="fa fa-trash"></i></button>
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
      clients:  [],
    }
  },

  created(){
    axios.get('/clients')
      .then(response => {
        this.clients = response.data;
        Vue.nextTick(function () {
          Event.$emit('init-datatable', 'tableAdd');
        })
    });
  }
}
</script>

<style lang="css">
</style>
