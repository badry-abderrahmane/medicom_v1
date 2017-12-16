<template lang="html">
  <table-warper>
    <div class="table-responsive" slot="content">
      <datatable-buttons>
        <tr slot="thead">
          <th width="12%">#ID</th>
          <th width="30%">Client</th>
          <th width="10%">Status</th>
          <th width="10%">Totale | P</th>
          <th>Totale | HT</th>
          <th width="15%">Action</th>
        </tr>
        <tr slot="tbody" v-for="commande in commandes">
          <td>{{ commande.id }}</td>
          <td><a @click="$router.push({ path: `/clients/show/`+commande.client.id })" class="text-primary btn">{{ commande.client.name }}</a></td>
          <td>
            <span v-if="commande.status == '1'" class="label label-danger block">En attente</span>
            <span v-if="commande.status == '2'" class="label label-success block">Livré</span>
          </td>
          <td><span class="label label-default">{{ commande.commandesproduits.count }}</span></td>
          <td><h5 class="text-success">{{ commande.totalHT  | currency('')  }}</h5></td>
          <td>
            <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/commandes/show/`+commande.id })"><i class="fa fa-eye"></i></button>
            <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/commandes/edit/`+commande.id })"><i class="fa fa-pencil"></i></button>
            <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/commandes/delete/`+commande.id })"><i class="fa fa-trash"></i></button>
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
      commandes:  [],
    }
  },
  created(){
    axios.get('/commandes')
      .then(response => {
        this.commandes = response.data;
        Vue.nextTick(function () {
          Event.$emit('init-datatable', 'tableAdd');
        })
    });
  }
}
</script>

<style lang="css">
</style>
