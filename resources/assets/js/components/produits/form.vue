<template lang="html">
  <div>
    <part-panel>
      <div slot="heading">
        Nouveau produit
      </div>
      <form v-on:submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)" slot="body">
        <div class="row">
          <part-input v-model="form" name="name" label="Nom"></part-input>
          <part-input v-model="form" name="reference" label="Référence"></part-input>
          <div class="col-md-6">
            <div class="form-group">
              <label for="Fournisseur" class="control-label mb-10">Categorie</label>
              <model-select :options="[{value:1,text:'categorie 1'},{value:2,text:'categorie 2'},{value:3,text:'categorie 3'}]" v-model="form['fournisseur']" placeholder="Choisir client..">
             </model-select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="Fournisseur" class="control-label mb-10">Fournisseur</label>
              <model-select :options="[{value:1,text:'fournisseur 1'},{value:2,text:'fournisseur 2'},{value:3,text:'fournisseur 3'}]" v-model="form['fournisseur']" placeholder="Choisir client..">
             </model-select>
            </div>
          </div>
          <part-input v-model="form" name="delaisLivraison" label="Délais de livraison"></part-input>
          <part-input v-model="form" name="prixFournisseur" label="Prix Fournisseur"></part-input>
          <part-input v-model="form" name="prixVente" label="Prix Vente"></part-input>
          <part-input v-model="form" name="quantiteMin" label="Quantité minimale"></part-input>
          <part-input v-model="form" name="quantiteMax" label="Quantité maximale"></part-input>
          <part-textarea v-model="form" name="note" label="Note"></part-textarea>
          <div class="col-md-6">
            <div class="form-group mb-30">
              <label class="control-label mb-10 text-left">Image Produit</label>
              <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                <span class="input-group-addon fileupload btn btn-success btn-anim btn-file"><i class="fa fa-upload"></i> <span class="fileinput-new btn-text">Choisir image</span> <span class="fileinput-exists btn-text">Modifier</span>
                <input type="file" @change="processFile($event)">
                </span> <a href="#" class="input-group-addon btn btn-danger btn-anim fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash"></i><span class="btn-text"> Remove</span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <part-button-submit :editing="editing"></part-button-submit>
        </div>
      </form>
    </part-panel>
  </div>
</template>

<script>
    import { ModelSelect } from 'vue-search-select'
    import { Form } from './../../api/form.js';
    export default {
        components: {
          ModelSelect
        },
        data(){
          return{
            form : new Form({
              id:'',
              name: '',
              reference: '',
              fournisseur: '',
              delaisLivraison: '',
              prixFournisseur: '',
              prixVente: '',
              quantiteMin: '',
              quantiteMax: '',
              note: '',
              img: '',
            }),
          }
        },
        computed:{
          editing: function(){
            if (this.$route.params.id) {
              return true
            }else{
              return false
            }
          },
        },
        created(){

        },

        methods: {
          processFile(event) {
            this.form.img = event.target.files[0];
          }
        }
    }
</script>

<style lang="css">
</style>
