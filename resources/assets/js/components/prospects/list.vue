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
        <tr slot="tbody" v-for="prospect in prospects">
          <td>{{ prospect.id }}</td>
          <td>{{ prospect.name }}</td>
          <td>{{ prospect.phone }}</td>
          <td>{{ prospect.adress }}</td>
          <td>{{ prospect.activite }}</td>
          <td>
            <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/prospects/show/`+prospect.id })"><i class="fa fa-eye"></i></button>
            <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/prospects/edit/`+prospect.id })"><i class="fa fa-pencil"></i></button>
            <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/prospects/delete/`+prospect.id })"><i class="fa fa-trash"></i></button>
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
      prospects:  [],
    }
  },

  created(){
    axios.get('/prospects')
      .then(response => {
        this.prospects = response.data;
        Vue.nextTick(function () {
          Event.$emit('init-datatable', 'tableAdd');
        })
    });
  }
}
</script>

<style lang="css">
</style>
