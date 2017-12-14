<template lang="html">
  <div>
    <div class="col-md-3">
      <part-panel-profile title="Client" :name="client.name">
        <div slot="count1">
          <span class="counts block head-font"><span class="counter-anim">11</span></span>
          <span class="counts-text block">Visites</span>
        </div>
        <div slot="count2">
          <span class="counts block head-font"><span class="counter-anim">122</span></span>
          <span class="counts-text block">Factures</span>
        </div>
      </part-panel-profile>
    </div>
    <div class="col-md-9">
      <part-panel-tabs :tabs="tabs">
        <div slot="1" class="text-center"><br>
          <infos-client :client="client"></infos-client>
        </div>
        <div slot="2">
          rebdez
        </div>
        <div slot="3">
          Visites
        </div>
        <div slot="4">
          Debv
        </div>
        <div slot="5">
          Fact
        </div>
      </part-panel-tabs>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return {
      tabs: [
        {id: '1', name: 'Informations'},
        {id: '2', name: 'Rendez-vous'},
        {id: '3', name: 'Visites'},
        {id: '4', name: 'Devis'},
        {id: '5', name: 'Factures'}
      ],
      client:{}
    }
  },
  computed:{
    clientId: function(){
      return this.$route.params.id
    }
  },
  created(){
    axios.get('/clients/'+this.clientId)
      .then(response => {
        this.client = response.data;
    });
  }
}
</script>

<style lang="css">
</style>
