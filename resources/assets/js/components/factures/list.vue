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
          <td>{{ facture.client.name }}</td>
          <td>
            <span v-if="facture.status == '0'" class="label label-danger block">En attente</span>
            <span v-if="facture.status == '1'" class="label label-warning block">Non Payé</span>
            <span v-if="facture.status == '2'" class="label label-success block">Payé</span>
          </td>
          <td>{{ facture.produits.count }}</td>
          <td>{{ facture.totale }}</td>
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
      factures:  [
        { id: '1', status: 0, client:{ id: '1', name:'Amine'}, produits:{count:'30'}, totale: '15550'},
        { id: '2', status: 1, client:{ id: '1', name:'Amine'}, produits:{count:'30'}, totale: '15550'},
        { id: '3', status: 2, client:{ id: '1', name:'Amine'}, produits:{count:'30'}, totale: '15550'},
      ],
    }
  }
}
</script>

<style lang="css">
</style>
