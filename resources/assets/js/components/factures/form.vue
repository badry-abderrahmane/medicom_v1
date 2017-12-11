<template lang="html">
  <div>
    <part-panel>
      <div slot="heading">
        Nouvelle facture
      </div>
      <div  slot="body">
        <div class="row">
          <div class="col-md-4">
            <h5 class="text-muted mb-10 pull-right">Client :</h5>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <model-select :options="[{value:1,text:'client 1'},{value:2,text:'client 2'},{value:3,text:'client 3'}]" v-model="client_id" placeholder="Choisir client..">
             </model-select>
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
                  <model-select :options="[{value:1,text:'pro 1'},{value:2,text:'pro 2'},{value:3,text:'pro 3'},{value:4,text:'Amine'}]" v-model="row.produit_id" placeholder="Choisir produit..">
                 </model-select>
                </div>
              </td>
              <td>
                <div class="form-group">
                  <input v-model="row.quantite" type="number" class="form-control" @change="countTotale(key)" required>
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
                </div>
              </td>
              <td>
                <div class="form-group">
                  <input v-model="row.totaleHT" type="number" class="form-control" disabled step="0.1" required>
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
            <button class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Enregistrer</button>
            <button class="btn btn-danger"><i class="fa fa-close"></i>&nbsp;&nbsp;Annuler</button>
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
          index: 0,
          rows: [
            {id:1, produit_id: 1, quantite: 20, prix: 10, prixHT:10, totaleHT: 200},
            {id:2, produit_id: 2, quantite: 100, prix: 10, prixHT:10, totaleHT: 1000},
            {id:3, produit_id: 3, quantite: 30, prix: 10, prixHT:10, totaleHT: 300},
          ],
          devisTotalHT: 0,
          devisTotalTTC: 0,
          client_id: '',
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
      },
      methods:{
        makeRow(key){
          if (this.index != key) {
            this.removeRow(key);
          }else{
            this.addRow();
          }
        },
        addRow(){
          this.index = this.index+1
          this.rows.push({id:'', produit_id: '', quantite: '', prix: '', prixHT:'', totaleHT: ''});
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
