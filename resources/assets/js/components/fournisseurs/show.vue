<template lang="html">
  <div>
    <div class="col-md-3">
      <part-panel-profile title="Fournisseur" :name="fournisseur.name">
        <div slot="count1">
          <span class="counts block head-font"><span class="counter-anim">11</span></span>
          <span class="counts-text block">Produits</span>
        </div>
        <div slot="count2">
          <span class="counts block head-font"><span class="counter-anim">122</span></span>
          <span class="counts-text block">Bon de commandes</span>
        </div>
      </part-panel-profile>
    </div>
    <div class="col-md-9">
      <part-panel-tabs :tabs="tabs">
        <div slot="1" class="text-center"><br>
          <infos-fournisseur :fournisseur="fournisseur"></infos-fournisseur>
        </div>
        <div slot="2">
          Produits
        </div>
        <div slot="3">
          Bon de commandes
        </div>
      </part-panel-tabs>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return {
      tabs: [{id: '1', name: 'Informations'},{id: '2', name: 'Produits'},{id: '3', name: 'Bon de commandes'}],
      fournisseur:{}
    }
  },

  computed:{
    fournisseurId: function(){
      return this.$route.params.id
    }
  },
  created(){
    axios.get('/fournisseurs/'+this.fournisseurId)
      .then(response => {
        this.fournisseur = response.data;
    });
  }
}
</script>

<style lang="css">
</style>
