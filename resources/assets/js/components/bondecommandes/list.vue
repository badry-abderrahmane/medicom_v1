<template lang="html">
  <table-warper>
    <div class="table-responsive" slot="content">
      <datatable-buttons>
        <tr slot="thead">
          <th width="12%" style="text-align: center;">#ID</th>
          <th width="30%" style="text-align: center;">Fournisseur</th>
          <th width="10%" style="text-align: center;">Status</th>
          <th width="10%" style="text-align: center;">Totale | P</th>
          <th width="15%" style="text-align: center;">Action</th>
        </tr>
        <tr slot="tbody" v-for="bondecommande in bondecommandes">
          <td style="text-align: center;">{{ bondecommande.id }}</td>
          <td><a @click="$router.push({ path: `/fournisseurs/show/`+bondecommande.fournisseur.id })" class="text-primary btn">{{ bondecommande.fournisseur.name }}</a></td>
          <td style="text-align: center;">
            <span v-if="bondecommande.status == '1'" class="label label-danger block">En attente</span>
            <span v-if="bondecommande.status == '2'" class="label label-success block">Livré</span>
          </td>
          <td><span class="label label-default">{{ bondecommande.bondecommandesproduits.count }}</span></td>
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
      bondecommandes:  [],
    }
  },

  created(){
    axios.get('/bondecommandes')
      .then(response => {
        this.bondecommandes = response.data;
        Vue.nextTick(function () {
          Event.$emit('init-datatable', 'tableAdd');
        })
    });
  }
}
</script>

<style lang="css">
</style>
