<template lang="html">
  <div>
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <part-panel-danger>
        <h6 class="panel-title txt-light" slot="heading">Suppression Visite</h6>
        <div slot="body">
          <h4 class="text-danger text-center">Etes vous sur de vouloir supprimer cette visite?</h4>
          <div class="row"><br><br>
            <div class="col-md-2"></div>
            <div class="col-md-4">
              <button class="btn btn-danger btn-block" @click="deleteMe">Supprimer&nbsp;&nbsp;</button>
            </div>
            <div class="col-md-4">
              <button class="btn btn-default btn-block" @click="$router.push({ path: `/visites`})">Annuler</button>
            </div>
          </div>
        </div>
      </part-panel-danger>
    </div>
  </div>
</template>

<script>
export default {
  computed:{
    visiteId: function(){
      return this.$route.params.id
    },
  },
  methods:{
    deleteMe(){
      axios.delete('/visites/'+this.visiteId)
      .then(response => {
        Event.$emit('publish-success-message', data.message);
      })
      .catch(function(err){
        console.log(err);
      });
      this.$router.push({ path: `/visites`})
    }
  }
}
</script>

<style lang="css">
</style>
