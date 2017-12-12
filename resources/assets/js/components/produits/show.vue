<template lang="html">
  <div>
    <part-panel>
      <div slot="heading">
        Détail produit
      </div>
      <div  slot="body">
        <div class="row">
          <div class="col-md-4">
            <img src="/dist/img/chair.jpg" alt="Image produit">
          </div>
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-6"><br>
                <h6 class="text-success">#ID:</h6>
                <h5><span class="label label-default">{{ produit.id }}</span></h5>
              </div>
              <div class="col-md-6"><br>
                <h6 class="text-success">Nom:</h6>
                <h5>{{ produit.name }}</h5>
              </div>
              <div class="col-md-6"><br>
                <h6 class="text-success">Référence:</h6>
                <h5>{{ produit.reference }}</h5>
              </div>
              <div class="col-md-6"><br>
                <h6 class="text-success">Categorie:</h6>
                <h5>{{ produit.category }}</h5>
              </div>
              <div class="col-md-6"><br>
                <h6 class="text-success">Fournisseur:</h6>
                <h5>{{ produit.fournisseur }}</h5>
              </div>
              <div class="col-md-6"><br>
                <h6 class="text-success">Delais de livraison:</h6>
                <h5>{{ produit.delaisLivraison }}</h5>
              </div>
              <div class="col-md-6"><br>
                <h6 class="text-success">Prix fournisseur:</h6>
                <h5>{{ produit.prixFournisseur }}</h5>
              </div>
              <div class="col-md-6"><br>
                <h6 class="text-success">Prix vente:</h6>
                <h5>{{ produit.prixVente }}</h5>
              </div>
              <div class="col-md-6"><br>
                <h6 class="text-success">Quantité minimale:</h6>
                <h5>{{ produit.quantiteMin }}</h5>
              </div>
              <div class="col-md-6"><br>
                <h6 class="text-success">Quantité Maximale:</h6>
                <h5>{{ produit.quantiteMax }}</h5>
              </div>
              <div class="col-md-6"><br>
                <h6 class="text-success">Note:</h6>
                <h5>{{ produit.note }}</h5>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4"></div>
              <div class="col-md-4">
                <button class="btn btn-success btn-block btn-outline btn-anim mt-30" @click="$router.push({ path: `/produits/edit/`+produit.id })">
                  <i class="fa fa-pencil"></i>
                  <span class="btn-text">Modifier les informations</span>
                </button><br>
              </div>
            </div>
          </div>
        </div>
      </div>
    </part-panel>
  </div>
</template>

<script>
    export default {
      data(){
        return {
          produit:{
            id: '1',
            name: 'Produit 1',
            reference: 'Ref3344',
            category: 'Categ 1',
            fournisseur: 'Fourni 1',
            delaisLivraison: '10',
            prixFournisseur: '100',
            prixVente: '110',
            quantiteMin: '100',
            quantiteMax: '0',
            note: 'Rien à spécifier.'
          }
        }
      },
    }
</script>

<style lang="css">
</style>
