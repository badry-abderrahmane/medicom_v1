<template lang="html">
  <div>
    <part-panel>
      <div slot="heading">
        Détail produit
      </div>
      <div  slot="body">
        <div class="row">
          <div class="col-md-4">
            <img :src="produit.img" alt="Image produit" height="355px" width="285px">
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
                <h5>{{ produit.category.name }}</h5>
              </div>
              <div class="col-md-6"><br>
                <h6 class="text-success">Fournisseur:</h6>
                <h5>{{ produit.fournisseur.name }}</h5>
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
          produit:{}
        }
      },

      computed:{
        produitId: function(){
          return this.$route.params.id
        }
      },
      created(){
        axios.get('/produits/'+this.produitId)
          .then(response => {
            this.produit = response.data;
        });
      }

    }
</script>

<style lang="css">
</style>
