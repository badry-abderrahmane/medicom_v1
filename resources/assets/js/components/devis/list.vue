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
        <tr slot="tbody" v-for="devi in devis">
          <td>{{ devi.id }}</td>
          <td>{{ devi.client.name }}</td>
          <td>
            <span v-if="devi.status" class="label label-success block">Livré</span>
            <span v-else class="label label-danger block">En attente</span>
          </td>
          <td>{{ devi.produits.count }}</td>
          <td>{{ devi.totale }}</td>
          <td>
            <button class="btn btn-default btn-icon-anim btn-circle"><i class="fa fa-eye"></i></button>
            <button class="btn btn-default btn-icon-anim btn-circle"><i class="fa fa-pencil"></i></button>
            <button class="btn btn-default btn-icon-anim btn-circle"><i class="fa fa-trash"></i></button>
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
      devis:  [
        { id: '1', status: 1, client:{ id: '1', name:'Amine'}, produits:{count:'30'}, totale: '15550'},
        { id: '2', status: 0, client:{ id: '1', name:'Amine'}, produits:{count:'30'}, totale: '15550'},
        { id: '3', status: 1, client:{ id: '1', name:'Amine'}, produits:{count:'30'}, totale: '15550'},
        { id: '4', status: 0, client:{ id: '1', name:'Amine'}, produits:{count:'30'}, totale: '15550'},
      ],
    }
  }
}
</script>

<style lang="css">
</style>
