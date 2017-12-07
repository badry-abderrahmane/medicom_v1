<template lang="html">
  <table-warper>
    <div class="table-responsive" slot="content">
      <datatable-buttons>
        <tr slot="thead">
          <th width="12%">#ID</th>
          <th width="20%">Nom</th>
          <th width="10%">Type</th>
          <th width="10%">Produits</th>
          <th>Telephone</th>
          <th>Adresse</th>
          <th width="15%">Action</th>
        </tr>
        <tr slot="tbody" v-for="fournisseur in fournisseurs">
          <td>{{ fournisseur.id }}</td>
          <td>{{ fournisseur.name }}</td>
          <td>{{ fournisseur.type }}</td>
          <td>{{ fournisseur.produits.count }}</td>
          <td>{{ fournisseur.phone }}</td>
          <td>{{ fournisseur.adress }}</td>
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
      fournisseurs:  [
        { id: '1', name: 'Badry Abdo', type: 'Impression', produits:{ count: 20 },phone: '06022885566', adress: '12 Casablanca'},
        { id: '2', name: 'Badry Abdo', type: 'Packaging', produits:{ count: 20 }, phone: '06022885566', adress: '12 Casablanca'},
        { id: '3', name: 'Badry Abdo', type: 'Design', produits:{ count: 20 }, phone: '06022885566', adress: '12 Casablanca'},
        { id: '4', name: 'Badry Abdo', type: 'Dev', produits:{ count: 20 }, phone: '06022885566', adress: '12 Casablanca'},
      ],
    }
  }
}
</script>

<style lang="css">
</style>
