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
        <tr slot="tbody" v-for="facture in factures">
          <td>{{ facture.id }}</td>
          <td><a @click="$router.push({ path: `/clients/show/`+facture.client.id })" class="text-primary btn">{{ facture.client.name }}</a></td>
          <td>
            <span v-if="facture.status == '1'" class="label label-danger block">En attente</span>
            <span v-if="facture.status == '2'" class="label label-warning block">Non Payée</span>
            <span v-if="facture.status == '3'" class="label label-success block">Payée</span>
          </td>
          <td><span class="label label-default">{{ facture.facturesproduits.count }}</span></td>
          <td><h5 class="text-success">{{ facture.totalHT | currency('') }}</h5></td>
          <td>
            <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/factures/show/`+facture.id })"><i class="fa fa-eye"></i></button>
            <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/factures/edit/`+facture.id })"><i class="fa fa-pencil"></i></button>
            <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/factures/delete/`+facture.id })"><i class="fa fa-trash"></i></button>
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
      factures:  [],
    }
  },
  created(){
    axios.get('/factures')
      .then(response => {
        this.factures = response.data;
        Vue.nextTick(function () {
          Event.$emit('init-datatable', 'tableAdd');
        })
    });
  }
}
</script>

<style lang="css">
</style>
