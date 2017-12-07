<template lang="html">
  <table-warper>
    <div class="table-responsive" slot="content">
      <datatable-buttons>
        <tr slot="thead">
          <th width="12%">#ID</th>
          <th width="20%">Nom</th>
          <th width="20%">Fournisseur</th>
          <th>Délais</th>
          <th>Prix | FN</th>
          <th>Prix | HT</th>
          <th>Prix | TTC</th>
          <th width="15%">Action</th>
        </tr>
        <tr slot="tbody" v-for="produit in produits">
          <td>{{ produit.id }}</td>
          <td>{{ produit.name }}</td>
          <td>{{ produit.fournisseur.name }}</td>
          <td>{{ produit.delais }}</td>
          <td>{{ produit.prixFournisseur }}</td>
          <td>{{ produit.prixHT }}</td>
          <td>{{ produit.prixTTC }}</td>
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
      produits:  [
        { id: '1', name: 'Papier A4', fournisseur: {name: 'Fourni 1'}, delais:'10',prixFournisseur:'100',prixHT:'150',prixTTC:'200'},
        { id: '2', name: 'Papier A4', fournisseur: {name: 'Fourni 1'}, delais:'10',prixFournisseur:'100',prixHT:'150',prixTTC:'200'},
        { id: '3', name: 'Papier A4', fournisseur: {name: 'Fourni 1'}, delais:'10',prixFournisseur:'100',prixHT:'150',prixTTC:'200'},
        { id: '4', name: 'Papier A4', fournisseur: {name: 'Fourni 1'}, delais:'10',prixFournisseur:'100',prixHT:'150',prixTTC:'200'},
      ],
    }
  }
}
</script>

<style lang="css">
</style>
