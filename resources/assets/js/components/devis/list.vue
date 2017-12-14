<template lang="html">
  <table-warper>
    <div class="table-responsive" slot="content">
      <datatable-buttons>
        <tr slot="thead">
          <th width="12%">#ID</th>
          <th width="30%">Prospect</th>
          <th width="10%">Status</th>
          <th width="10%">Totale | P</th>
          <th>Totale | HT</th>
          <th width="15%">Action</th>
        </tr>
        <tr slot="tbody" v-for="devi in devis">
          <td>{{ devi.id }}</td>
          <td>{{ devi.prospect.name }}</td>
          <td>
            <span v-if="devi.status == '1'" class="label label-danger block">En attente</span>
            <span v-if="devi.status == '2'" class="label label-success block">Livré</span>
          </td>
          <td>{{ devi.devisproduits.count }}</td>
          <td>{{ devi.totalHT }}</td>
          <td>
            <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/devis/show/`+devi.id })"><i class="fa fa-eye"></i></button>
            <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/devis/edit/`+devi.id })"><i class="fa fa-pencil"></i></button>
            <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/devis/delete/`+devi.id })"><i class="fa fa-trash"></i></button>
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
      devis:  [],
    }
  },
  created(){
    axios.get('/devis')
      .then(response => {
        this.devis = response.data;
        Vue.nextTick(function () {
          Event.$emit('init-datatable', 'tableAdd');
        })
    });
  }
}
</script>

<style lang="css">
</style>
