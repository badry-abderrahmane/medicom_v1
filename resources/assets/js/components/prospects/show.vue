<template lang="html">
  <div>
    <div class="col-md-3">
      <part-panel-profile title="Prospect" :name="prospect.name">
        <div slot="count1">
          <span class="counts block head-font"><span class="counter-anim">11</span></span>
          <span class="counts-text block">Rendez-vous</span>
        </div>
        <div slot="count2">
          <span class="counts block head-font"><span class="counter-anim">34</span></span>
          <span class="counts-text block">Devis</span>
        </div>
      </part-panel-profile>
    </div>
    <div class="col-md-9">
      <part-panel-tabs :tabs="tabs">
        <div slot="1" class="text-center"><br>
          <infos-prospect :prospect="prospect"></infos-prospect>
        </div>
        <div slot="2">
          <infos-prospect-rendezvous :rendezvous="prospect.rendezvous"></infos-prospect-rendezvous>
        </div>
        <div slot="3">
          <infos-prospect-devis :devis="prospect.devis"></infos-prospect-devis>
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
        {id: '3', name: 'Devis'},
      ],
      prospect:{}
    }
  },
  computed:{
    prospectId: function(){
      return this.$route.params.id
    }
  },
  created(){
    axios.get('/prospects/'+this.prospectId)
      .then(response => {
        this.prospect = response.data;
        Vue.nextTick(function () {
          Event.$emit('init-datatable', 'tableAdd');
        })
    });
  }
}
</script>

<style lang="css">
</style>
