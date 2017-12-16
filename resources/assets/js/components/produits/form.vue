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
              <model-select :options="categories" v-model="form['category_id']" placeholder="Choisir client..">
             </model-select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="Fournisseur" class="control-label mb-10">Fournisseur</label>
              <model-select :options="fournisseurs" v-model="form['fournisseur_id']" placeholder="Choisir client..">
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
              fournisseur_id: '',
              category_id: '',
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
          produitId: function(){
            return this.$route.params.id
          },

          fournisseurs: function(){
            return this.$store.state.fournisseurs
          },
          categories: function(){
            return this.$store.state.categories
          }
        },
        created(){
          if (this.produitId) {
            axios.get('/produits/'+this.produitId)
              .then(response => {
                this.form.load(response.data);
            });
          }
        },

        methods: {
          onSubmit(){
            if (this.form.id == '') {
              this.form.post('/produits')
                .then(data => {
                  this.$store.dispatch('LOAD_PRODUIT_LIST')
                  this.$store.dispatch('LOAD_PRODUIT_PRIX')
                  Event.$emit('publish-success-message', data.message);
                  this.goback();
                })
                .catch(errors =>{
                  console.log(errors);
                });
            }else{
              this.form.put('/produits')
                .then(data => {
                  this.$store.dispatch('LOAD_PRODUIT_LIST')
                  this.$store.dispatch('LOAD_PRODUIT_PRIX')
                  Event.$emit('publish-success-message', data.message);
                  this.goback();
                })
                .catch(errors => {
                  console.log(errors);
                });
            }
          },

          goback(){
              this.$router.go(-1);
          },

          processFile(e) {
              let files = e.target.files || e.dataTransfer.files;
              if (!files.length)
                  return;
              this.createImage(files[0]);
          },
          createImage(file) {
              let reader = new FileReader();
              let vm = this;
              reader.onload = (e) => {
                  vm.form.img = e.target.result;
                  vm.form.errors.clear('img');
              };
              reader.readAsDataURL(file);
          },
        }
    }
</script>

<style lang="css">
</style>
