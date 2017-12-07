<template lang="html">
  <div>
    <div class="col-md-3">
      <part-panel-profile title="Client" :name="$route.params.id">
        <div slot="count1">
          <span class="counts block head-font"><span class="counter-anim">11</span></span>
          <span class="counts-text block">Visites</span>
        </div>
        <div slot="count2">
          <span class="counts block head-font"><span class="counter-anim">34</span></span>
          <span class="counts-text block">Devis</span>
        </div>
        <div slot="count3">
          <span class="counts block head-font"><span class="counter-anim">122</span></span>
          <span class="counts-text block">Factures</span>
        </div>
      </part-panel-profile>
      <h5>{{ $route.params.id }}</h5>
    </div>
    <div class="col-md-9">
      <part-panel-tabs :tabs="tabs">
        <div slot="Informations" class="text-center"><br>
          <infos-client :client="client"></infos-client>
        </div>
        <div slot="Rendez-vous">
          rebdez
        </div>
        <div slot="Visites">
          Visites
        </div>
        <div slot="Devis">
          Debv
        </div>
        <div slot="Factures">
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
      tabs: ['Informations','Rendez-vous','Visites','Devis','Factures'],
      client:{
        id: '1',
        name: 'Malcom X',
        phone:'06 55 22 66 44',
        adress:'16 Casablanca',
      }
    }
  }
}
</script>

<style lang="css">
</style>
