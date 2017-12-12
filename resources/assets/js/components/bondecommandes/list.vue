<template lang="html">
  <table-warper>
    <div class="table-responsive" slot="content">
      <datatable-buttons>
        <tr slot="thead">
          <th width="12%" style="text-align: center;">#ID</th>
          <th width="30%" style="text-align: center;">Fournisseur</th>
          <th width="10%" style="text-align: center;">Status</th>
          <th width="10%" style="text-align: center;">Totale | P</th>
          <th style="text-align: center;">Totale | HT</th>
          <th width="15%" style="text-align: center;">Action</th>
        </tr>
        <tr slot="tbody" v-for="bondecommande in bondecommandes">
          <td style="text-align: center;">{{ bondecommande.id }}</td>
          <td style="text-align: center;">{{ bondecommande.fournisseur.name }}</td>
          <td style="text-align: center;">
            <span v-if="bondecommande.status" class="label label-success block">Livré</span>
            <span v-else class="label label-danger block">En attente</span>
          </td>
          <td style="text-align: center;">{{ bondecommande.produits.count }}</td>
          <td style="text-align: center;">{{ bondecommande.totale }}</td>
          <td>
            <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/bondecommandes/show/`+bondecommande.id })"><i class="fa fa-eye"></i></button>
            <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/bondecommandes/edit/`+bondecommande.id })"><i class="fa fa-pencil"></i></button>
            <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/bondecommandes/delete/`+bondecommande.id })"><i class="fa fa-trash"></i></button>
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
      bondecommandes:  [
        { id: '1', status: 1, fournisseur:{ id: '1', name:'Amine'}, produits:{count:'30'}, totale: '15550'},
        { id: '2', status: 0, fournisseur:{ id: '1', name:'Amine'}, produits:{count:'30'}, totale: '15550'},
        { id: '3', status: 1, fournisseur:{ id: '1', name:'Amine'}, produits:{count:'30'}, totale: '15550'},
        { id: '4', status: 0, fournisseur:{ id: '1', name:'Amine'}, produits:{count:'30'}, totale: '15550'},
      ],
    }
  }
}
</script>

<style lang="css">
</style>
