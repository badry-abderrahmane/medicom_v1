<template lang="html">
  <div>
    <part-panel>
      <div slot="heading">
        Détail devis
      </div>
      <div  slot="body">
        <div class="row">
          <div class="col-md-4">
            <div class="well" style="min-height:130px;">
              <p>Date de génération:</p>
              <p><h6>{{ devi.created_at }}</h6></p>
              <p>Date de livraison:</p>
              <br>
            </div>
          </div>
          <div class="col-md-4"></div>
          <div class="col-md-4">
            <div class="well" style="min-height:130px;">
              <p>Prospect:</p>
              <p><h6>{{ devi.prospect.name }}</h6></p>
            </div>
          </div>
        </div>
        <table class="tablesaw table-striped table-hover table-bordered table tablesaw-columntoggle">
          <thead>
            <th width="45%">Produit</th>
            <th width="20%">Quantité</th>
            <th width="20%">Prix(HT)</th>
            <th width="20%">Totale(HT)</th>
          </thead>
          <tbody>
            <tr v-for="row,key in rows">
              <td> {{ row.produit.name }} </td>
              <td> {{ row.quantite }} </td>
              <td> {{ row.prixHT }} </td>
              <td> {{ row.totalHT }} </td>
            </tr>
            <tr>
              <td colspan="2" style="visibility:hidden;"></td>
              <td style="border-left: 2px solid;">Totale(HT)</td>
              <td style="border-left: 2px solid;">{{ devi.totalHT }}</td>
            </tr>
            <tr>
              <td colspan="2" style="visibility:hidden;"></td>
              <td style="border-left: 2px solid;">TVA</td>
              <td style="border-left: 2px solid;">20%</td>
            </tr>
            <tr>
              <td colspan="2" style="visibility:hidden;border-left: 2px solid;"></td>
              <td style="border-left: 2px solid;">Totale(TTC)</td>
              <td style="border-left: 2px solid;">{{ devi.totalTTC }}</td>
            </tr>
          </tbody>
        </table>
        <div class="row"><br><br>
          <div class="col-md-6 col-sm-offset-4 col-sm-6">
            <button class="btn btn-primary" @click="openPDFSans(devi.id)"><i class="fa fa-print"></i>&nbsp;&nbsp;Devis Sans Totale</button>
            <button class="btn btn-warning" @click="openPDF(devi.id)"><i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;Devis</button>
            <!-- <button class="btn btn-info" disabled><i class="fa fa-paper-plane"></i>&nbsp;&nbsp;Envoyer par email</button> -->
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
          rows: [],
          devi: []
        }
      },

      computed:{
        deviId: function(){
          return this.$route.params.id
        }
      },
      created(){
        axios.get('/devis/'+this.deviId)
          .then(response => {
            this.devi = response.data;
            this.rows = response.data.devisproduits;
        });
      },
      methods:{
        openPDF(id){
          var getUrl = window.location;
          var url = getUrl.origin+'/pdf/devis/'+id;
          var win = window.open(url, '_blank');
          win.focus();
        },
        openPDFSans(id){
          var getUrl = window.location;
          var url = getUrl.origin+'/pdf/devissans/'+id;
          var win = window.open(url, '_blank');
          win.focus();
        },
      }
    }
</script>

<style lang="css">
</style>
