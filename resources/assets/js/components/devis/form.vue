<template lang="html">
  <div>
    <part-panel>
      <div slot="heading">
        Nouveau devis
      </div>
      <div  slot="body">
        <div class="row">
          <div class="col-md-4">

          </div>
          <div class="col-md-4">
            <div v-bind:class="[ prospect_id == '' ? 'has-error' : '', 'form-group']">
              <label for="Fournisseur" class="control-label mb-10">Client</label>
              <model-select :options="[{value:1,text:'prospzct 1'},{value:2,text:'prospzct 2'},{value:3,text:'prospzct 3'}]" v-model="prospect_id">
             </model-select>
             <div class="help-block" v-if="prospect_id == ''">Veuillez spécifier un prospect!</div>
            </div>
          </div>
        </div><br>
        <table class="tablesaw table-striped table-hover table-bordered table tablesaw-columntoggle">
          <thead>
            <th width="25%">Produit</th>
            <th width="20%">Quantité</th>
            <th width="17%">Prix</th>
            <th width="17%">Prix(HT)</th>
            <th width="17%">Totale(HT)</th>
            <th width="5%"></th>
          </thead>
          <tbody>
            <tr v-for="row,key in rows">
              <td>
                <div class="form-group">
                  <model-select :options="[{value:1,text:'pro 1'},{value:2,text:'pro 2'},{value:3,text:'pro 3'},{value:4,text:'Amine'}]" v-model="row.produit_id" placeholder="Choisir produit.." >
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
                <div class="input-group mb-15">
									<input v-model="row.prix" class="form-control" disabled>
									<span class="input-group-btn">
									  <button @click="insertPrix(key)" class="btn btn-success" style="padding-left: 10px;padding-right: 10px;"><i class="fa fa-arrow-right fa-xs"></i></button>
									</span>
								</div>
              </td>
              <td>
                <div class="form-group">
                  <input v-model="row.prixHT" type="number" class="form-control" @change="countTotale(key)" step="0.1" required>
                  <div class="help-block text-danger" v-if="row.prixHT == ''"> <i class="fa fa-exclamation-triangle"></i></div>
                </div>
              </td>
              <td>
                <div class="form-group">
                  <input v-model="row.totalHT" type="number" class="form-control" disabled step="0.1" required>
                  <div class="help-block text-danger" v-if="row.totalHT == ''"> <i class="fa fa-exclamation-triangle"></i></div>
                </div>
              </td>
              <td>
                <div class="form-group">
                  <button :class="key != index ? 'btn btn-danger btn-sm':'btn btn-success btn-sm'" @click="makeRow(key)" style="padding-left: 10px;padding-right: 10px;">
                    <i :class="key != index ? 'fa fa-close fa-2x':'fa fa-plus fa-2x'"></i>
                  </button>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="3" style="visibility:hidden;"></td>
              <td >Totale(HT)</td>
              <td>{{ devisTotalHT }}</td>
              <td style="visibility:hidden;"></td>
            </tr>
            <tr>
              <td colspan="3" style="visibility:hidden;"></td>
              <td >TVA</td>
              <td>20%</td>
              <td style="visibility:hidden;"></td>
            </tr>
            <tr>
              <td colspan="3" style="visibility:hidden;"></td>
              <td >Totale(TTC)</td>
              <td>{{ devisTotalTTC }}</td>
              <td style="visibility:hidden;"></td>
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
          rows: [
            // {id:1, produit_id: 1, quantite: 20,  prix: 10, prixHT:10, totalHT: 200},
            // {id:2, produit_id: 2, quantite: 100, prix: 10, prixHT:10, totalHT: 1000},
            // {id:3, produit_id: 3, quantite: 30,  prix: 10, prixHT:10, totalHT: 300},
          ],
          devisTotalHT: 0,
          devisTotalTTC: 0,
          prospect_id: '',
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
        deviId: function(){
          return this.$route.params.id
        }
      },
      created(){
        if (this.rows.length) {
          this.index = this.rows.length-1;
          this.countTotalHT();
          this.countTotalTTC();
        }else{
          this.addRow();
          this.index = this.index-1
        }

        if (this.deviId) {
          axios.get('/devis/'+this.deviId)
            .then(response => {
              //this.form.load(response.data);
          });
        }
      },
      methods:{
        submitThis(){
          this.form = new Form({
            id: this.deviId,
            rows: this.rows,
            totalHT: this.devisTotalHT,
            totalTTC: this.devisTotalTTC,
            prospect_id: this.prospect_id,
          });
          this.onSubmit();
        },
        onSubmit(){
          if (this.form.id == '' || this.form.id == undefined) {
            this.form.post('/devis')
              .then(data => {
                Event.$emit('publish-success-message', data.message);
                this.goback();
              })
              .catch(errors =>{
                Event.$emit('publish-danger-message', 'Une erreur s\'est produite');
                console.log(errors);
              });
          }else{
            this.form.put('/devis')
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

        goback(){
            this.$router.go(-1);
        },
        makeRow(key){
          if (this.index != key) {
            this.removeRow(key);
          }else{
            this.addRow();
          }
        },
        addRow(){
          this.index = this.index+1
          this.rows.push({id:'', produit_id: '', quantite: '', prix: '', prixHT:'', totalHT: ''});
        },
        removeRow(key){
          this.index = this.index-1
          this.rows.splice(key, 1);
          this.countTotalHT();
          this.countTotalTTC();
        },
        countTotale(key){
          if (this.rows[key].prixHT < this.rows[key].prix) {
            this.rows[key].prixHT = this.rows[key].prix;
            this.rows[key].totalHT = this.rows[key].prixHT*this.rows[key].quantite;
          }else{
            this.rows[key].totalHT = this.rows[key].prixHT*this.rows[key].quantite;
          }
          this.countTotalHT();
          this.countTotalTTC();
        },
        countTotalHT(){
          let count =  this.rows.reduce(function(total, item) {
              return total + parseInt(item['totalHT'])
          }, 0)
          this.devisTotalHT = count;
        },
        countTotalTTC(){
          let sum = this.devisTotalHT;
          let tva = sum*20/100;
          this.devisTotalTTC =  sum+tva;
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
