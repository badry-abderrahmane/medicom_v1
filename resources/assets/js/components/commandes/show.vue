<template lang="html">
  <div>
    <part-panel>
      <div slot="heading">
        Détail commande
      </div>
      <div  slot="body">
        <div class="row">
          <div class="col-md-4">
            <div class="well" style="min-height:130px;">
              <p>Date de génération:</p>
              <p><h6>{{ commande.created_at }}</h6></p>
              <p>Date de livraison:</p>
              <br>
            </div>
          </div>
          <div class="col-md-4"></div>
          <div class="col-md-4">
            <div class="well" style="min-height:130px;">
              <p>Client:</p>
              <p><h6>{{ commande.client.name }}</h6></p>
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
              <td> {{ row.produit.name }} </td>
              <td> {{ row.quantite }} </td>
              <td> {{ row.prixHT }} </td>
              <td> {{ row.totalHT }} </td>
              <td> {{ row.quantite }} </td>
            </tr>
            <tr>
              <td colspan="3" style="visibility:hidden;"></td>
              <td style="border-left: 2px solid;">Totale(HT)</td>
              <td style="border-left: 2px solid;">{{ commande.totalHT }}</td>
            </tr>
            <tr>
              <td colspan="3" style="visibility:hidden;"></td>
              <td style="border-left: 2px solid;">TVA</td>
              <td style="border-left: 2px solid;">20%</td>
            </tr>
            <tr>
              <td colspan="3" style="visibility:hidden;border-left: 2px solid;"></td>
              <td style="border-left: 2px solid;">Totale(TTC)</td>
              <td style="border-left: 2px solid;">{{ commande.totalTTC }}</td>
            </tr>
          </tbody>
        </table>
        <div class="row"><br><br>
          <div class="col-md-6 col-sm-offset-4 col-sm-6">
            <button class="btn btn-primary" @click="openPDF(commande.id)"><i class="fa fa-print"></i>&nbsp;&nbsp;Imprimer</button>
            <button class="btn btn-warning" @click="openPDF(commande.id)"><i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;PDF</button>
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
          rows: [],
          commande: []
        }
      },

      computed:{
        commandeId: function(){
          return this.$route.params.id
        }
      },
      created(){
        axios.get('/commandes/'+this.commandeId)
          .then(response => {
            this.commande = response.data;
            this.rows = response.data.commandesproduits;
        });
      },
      methods:{
        openPDF(id){
          var getUrl = window.location;
          var url = getUrl.origin+'/pdf/commande/'+id;
          var win = window.open(url, '_blank');
          win.focus();
        }
      }
    }
</script>

<style lang="css">
</style>
