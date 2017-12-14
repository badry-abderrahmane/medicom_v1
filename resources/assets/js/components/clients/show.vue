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
          <infos-client-visites :visites="client.visites"></infos-client-visites>
        </div>
        <div slot="3">
          <infos-client-commandes :commandes="client.commandes"></infos-client-commandes>
        </div>
        <div slot="4">
          <infos-client-factures :factures="client.factures"></infos-client-factures>
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
        {id: '2', name: 'Visites'},
        {id: '3', name: 'Commandes'},
        {id: '4', name: 'Factures'}
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
        Vue.nextTick(function () {
          Event.$emit('init-datatable', 'tableAdd');
        })
    });
  }
}
</script>

<style lang="css">
</style>
