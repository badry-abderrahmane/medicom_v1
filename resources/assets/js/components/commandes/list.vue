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
          <td>{{ commande.client.name }}</td>
          <td>
            <span v-if="commande.status" class="label label-success block">Livré</span>
            <span v-else class="label label-danger block">En attente</span>
          </td>
          <td>{{ commande.produits.count }}</td>
          <td>{{ commande.totale }}</td>
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
      commandes:  [
        { id: '1', status: 0, client:{ id: '1', name:'Amine'}, produits:{count:'30'}, totale: '15550'},
        { id: '2', status: 1, client:{ id: '1', name:'Amine'}, produits:{count:'30'}, totale: '15550'},
        { id: '3', status: 0, client:{ id: '1', name:'Amine'}, produits:{count:'30'}, totale: '15550'},
      ],
    }
  }
}
</script>

<style lang="css">
</style>
