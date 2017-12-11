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
              <p><h6>{{ devis.created_at }}</h6></p>
              <p>Date de livraison:</p>
              <br>
            </div>
          </div>
          <div class="col-md-4"></div>
          <div class="col-md-4">
            <div class="well" style="min-height:130px;">
              <p>Client:</p>
              <p><h6>{{ client.name }}</h6></p>
            </div>
          </div>
        </div>
        <table class="tablesaw table-striped table-hover table-bordered table tablesaw-columntoggle">
          <thead>
            <th width="25%">Produit</th>
            <th width="20%">Quantité</th>
            <th width="17%">Prix</th>
            <th width="17%">Prix(HT)</th>
            <th width="17%">Totale(HT)</th>
          </thead>
          <tbody>
            <tr v-for="row,key in rows">
              <td> {{ row.produit_id }} </td>
              <td> {{ row.quantite }} </td>
              <td> {{ row.prixHT }} </td>
              <td> {{ row.totaleHT }} </td>
              <td> {{ row.quantite }} </td>
            </tr>
            <tr>
              <td colspan="3" style="visibility:hidden;"></td>
              <td style="border-left: 2px solid;">Totale(HT)</td>
              <td style="border-left: 2px solid;">{{ devisTotalHT }}</td>
            </tr>
            <tr>
              <td colspan="3" style="visibility:hidden;"></td>
              <td style="border-left: 2px solid;">TVA</td>
              <td style="border-left: 2px solid;">20%</td>
            </tr>
            <tr>
              <td colspan="3" style="visibility:hidden;border-left: 2px solid;"></td>
              <td style="border-left: 2px solid;">Totale(TTC)</td>
              <td style="border-left: 2px solid;">{{ devisTotalTTC }}</td>
            </tr>
          </tbody>
        </table>
        <div class="row"><br><br>
          <div class="col-md-6 col-sm-offset-4 col-sm-6">
            <button class="btn btn-primary"><i class="fa fa-print"></i>&nbsp;&nbsp;Imprimer</button>
            <button class="btn btn-warning"><i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;PDF</button>
            <button class="btn btn-info" disabled><i class="fa fa-paper-plane"></i>&nbsp;&nbsp;Envoyer par email</button>
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
          rows: [
            {id:1, produit_id: 1, quantite: 20, prix: 10, prixHT:10, totaleHT: 200},
            {id:2, produit_id: 2, quantite: 100, prix: 10, prixHT:10, totaleHT: 1000},
            {id:3, produit_id: 3, quantite: 30, prix: 10, prixHT:10, totaleHT: 300},
          ],
          devisTotalHT: 0,
          devisTotalTTC: 0,
          client:{ name:'Company Name tes test test' },
          devis:{ created_at:'22-10-2018'}
        }
      },
    }
</script>

<style lang="css">
</style>
