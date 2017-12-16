<template lang="html">
  <div>
    <part-panel>
      <div slot="heading">
        Nouveau Bon de Commande
      </div>
      <div  slot="body">
        <div class="row">
          <div class="col-md-2">
            <h5 class="text-muted mb-10 pull-right">Fournisseur :</h5>
          </div>
          <div class="col-md-3">
            <div v-bind:class="[ fournisseur_id == '' ? 'has-error' : '', 'form-group']">
              <model-select :options="fournisseurs" v-model="fournisseur_id" placeholder="Choisir client..">
             </model-select>
             <div class="help-block" v-if="fournisseur_id == ''">Veuillez spécifier un client!</div>
            </div>
          </div>
          <div class="col-md-3">
            <h5 class="text-muted mb-10 pull-right">Status :</h5>
          </div>
          <div class="col-md-3">
            <div v-bind:class="[ status == '' ? 'has-error' : '', 'form-group']">
              <model-select name="status" :options="[{value:1,text:'En attente'},{value:2,text:'Livré'}]" v-model="status" placeholder="Choisir status..">
             </model-select>
             <div class="help-block" v-if="status == ''">Veuillez spécifier un status!</div>
            </div>
          </div>
        </div><br>
        <table class="tablesaw table-striped table-hover table-bordered table tablesaw-columntoggle">
          <thead>
            <th width="45%">Produit</th>
            <th width="45%">Quantité</th>
            <th width="10%"></th>
          </thead>
          <tbody>
            <tr v-for="row,key in rows">
              <td>
                <div class="form-group">
                  <model-select :options="produits" v-model="row.produit_id" placeholder="Choisir produit..">
                 </model-select>
                 <div class="help-block text-danger" v-if="row.produit_id == ''"> <i class="fa fa-exclamation-triangle"></i></div>
                </div>
              </td>
              <td>
                <div class="form-group">
                  <input v-model="row.quantite" type="number" class="form-control" @change="countTotale(key)" required>
                  <div class="help-block text-danger" v-if="row.quantite == ''"> <i class="fa fa-exclamation-triangle"></i></div>
                </div>
              </td>
              <td>
                <div class="form-group">
                  <button :class="key != index ? 'btn btn-danger btn-sm':'btn btn-success btn-sm'" @click="makeRow(key,row)" style="padding-left: 10px;padding-right: 10px;">
                    <i :class="key != index ? 'fa fa-close fa-2x':'fa fa-plus fa-2x'"></i>
                  </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        <div class="row"><br><br>
          <div class="col-md-4 col-sm-offset-4 col-sm-4">
            <button class="btn btn-primary" @click="submitThis"><i class="fa fa-save"></i>&nbsp;&nbsp;Enregistrer</button>
            <button class="btn btn-danger" @click="goback"><i class="fa fa-close"></i>&nbsp;&nbsp;Annuler</button>
          </div>
        </div>
      </div>
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
        return {
          from:'',
          index: 0,
          rows: [],
          fournisseur_id: '',
          status:'',
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
        bondecommandeId: function(){
          return this.$route.params.id
        },

        fournisseurs: function(){
          return this.$store.state.fournisseurs
        },

        produits: function(){
          return this.$store.state.produits
        },
      },
      created(){
        if (this.bondecommandeId) {
          axios.get('/bondecommandes/'+this.bondecommandeId)
            .then(response => {
              this.rows = response.data.bondecommandesproduits;
              this.fournisseur_id   = response.data.fournisseur_id;
              this.status        = response.data.status;

              if (this.rows.length) {
                this.index = this.rows.length-1;
              }else{
                this.addRow();
                this.index = this.index-1
              }
          });
        }else{
          this.addRow();
          this.index = this.index-1
        }
      },
      methods:{
        submitThis(){
          this.form = new Form({
            id: this.bondecommandeId,
            rows: this.rows,
            fournisseur_id: this.fournisseur_id,
            status: this.status,
          });
          this.onSubmit();
        },
        onSubmit(){
          if (this.form.id == '' || this.form.id == undefined) {
            this.form.post('/bondecommandes')
              .then(data => {
                Event.$emit('publish-success-message', data.message);
                this.goback();
              })
              .catch(errors =>{
                Event.$emit('publish-danger-message', 'Une erreur s\'est produite');
                console.log(errors);
              });
          }else{
            this.form.put('/bondecommandes')
              .then(data => {
                Event.$emit('publish-success-message', data.message);
                this.goback();
              })
              .catch(errors => {
                Event.$emit('publish-danger-message', 'Une erreur s\'est produite');
                console.log(errors);
              });
          }
        },
        deleteBondecommande(row){
          axios.delete('/bondecommandesproduits/'+row.id)
          .then(response => {
          })
          .catch(function(err){
            console.log(err);
          });
        },
        goback(){
            this.$router.go(-1);
        },

        makeRow(key,row){
          if (this.index != key) {
            this.removeRow(key,row);
          }else{
            this.addRow();
          }
        },
        addRow(){
          this.index = this.index+1
          this.rows.push({id:'', produit_id: '', quantite: ''});
        },
        removeRow(key,row){
          this.index = this.index-1
          this.rows.splice(key, 1);
          this.countTotalHT();
          this.countTotalTTC();
          this.deleteBondecommande(row);
        },
        countTotale(key){
          if (this.rows[key].prixHT < this.rows[key].prix) {
            this.rows[key].prixHT = this.rows[key].prix;
            this.rows[key].totaleHT = this.rows[key].prixHT*this.rows[key].quantite;
          }else{
            this.rows[key].totaleHT = this.rows[key].prixHT*this.rows[key].quantite;
          }
          this.countTotalHT();
          this.countTotalTTC();
        },
        countTotalHT(){
          let count =  this.rows.reduce(function(total, item) {
              return total + parseInt(item['totaleHT'])
          }, 0)
          this.bondecommandesTotalHT = count;
        },
        countTotalTTC(){
          let sum = this.bondecommandesTotalHT;
          let tva = sum*20/100;
          this.bondecommandesTotalTTC =  sum+tva;
        },
        insertPrix(key){
          this.rows[key].prixHT = this.rows[key].prix;
        }
      }
    }
</script>

<style lang="css">
.search{
  border: 1px solid rgba(33, 33, 33, 0.12);
  border-radius: 0 !important;
  background-color: #fff;
  box-shadow: none;
  color: #212121;
  height: 42px;
}
</style>
