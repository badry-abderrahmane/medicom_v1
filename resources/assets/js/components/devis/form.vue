<template lang="html">
  <div>
    <part-panel>
      <div slot="heading">
        Nouveau devis
      </div>
      <div  slot="body">
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
                  <select class="form-control select2" v-model="row.produit_id">
                    <option>Select</option>
                    <option value="1">Produit 1</option>
                    <option value="2">Produit 2</option>
                    <option value="3">Produit 3</option>
                    <option value="4">Produit 4</option>
                    <option value="5">Produit 5</option>
                  </select>
                </div>
              </td>
              <td>
                <div class="form-group">
                  <input v-model="row.quantite" type="number" class="form-control" @change="countTotale(key)">
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
                  <input v-model="row.prixHT" type="number" class="form-control" @change="countTotale(key)" step="0.1">
                </div>
              </td>
              <td>
                <div class="form-group">
                  <input v-model="row.totaleHT" type="number" class="form-control" disabled step="0.1">
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
              <td>{{ devisTotaleTTC }}</td>
              <td style="visibility:hidden;"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </part-panel>
  </div>
</template>

<script>
    import { Form } from './../../api/form.js';
    export default {
      data(){
        return {
          index: 0,
          rows: [
            {id:1, produit_id: 1, quantite: 20, prix: 510, prixHT:150, totaleHT: 100},
            {id:2, produit_id: 2, quantite: 120, prix: 250, prixHT:520, totaleHT: 200},
            {id:3, produit_id: 3, quantite: 30, prix: 530, prixHT:110, totaleHT: 300},
            {id:4, produit_id: 4, quantite: 170, prix: 150, prixHT:220, totaleHT: 400},
          ],
        }
      },
      computed:{
        devisTotalHT: function(){
          return this.rows.reduce(function(total, item) {
              return total + item['prixHT']
          }, 0)
        },
        devisTotaleTTC: function(){
          let sum = this.rows.reduce(function(total, item) {
              return total + item['prixHT']
          }, 0);
          let tva = sum*20/100;
          return sum+tva;
        }
      },
      filters:{

      },
      created(){

        if (this.rows.length) {
          this.index = this.rows.length-1;
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
          Vue.nextTick()
          .then(function () {
            $(".select2").select2();
          })
        },
        removeRow(key){
          this.index = this.index-1
          this.rows.splice(key, 1);
        },
        countTotale(key){
          if (this.rows[key].prixHT < this.rows[key].prix) {
            this.rows[key].prixHT = this.rows[key].prix;
            this.rows[key].totaleHT = this.rows[key].prixHT*this.rows[key].quantite;
          }else{
            this.rows[key].totaleHT = this.rows[key].prixHT*this.rows[key].quantite;
          }
        },
        insertPrix(key){
          this.rows[key].prixHT = this.rows[key].prix;
        }
      }
    }
</script>

<style lang="css">
</style>
