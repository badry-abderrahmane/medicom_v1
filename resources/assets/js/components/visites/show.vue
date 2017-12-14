<template lang="html">
  <div>
    <part-panel>
      <div slot="heading">
        Détail Visite
      </div>
      <div  slot="body">
        <div class="row">
          <div class="col-md-6"><br>
            <h6 class="text-success">Date:</h6>
            <h5>{{ visite.date }}</h5>
          </div>
          <div class="col-md-6"><br>
            <h6 class="text-success">Client:</h6>
            <h5>{{ visite.client.name }}</h5>
          </div>
          <div class="col-md-6"><br>
            <h6 class="text-success">Status:</h6>
            <h5>{{ visite.status }}</h5>
          </div>
          <div class="col-md-6"><br>
            <h6 class="text-success">Type:</h6>
            <h5>{{ visite.type }}</h5>
          </div>
          <div class="col-md-6"><br>
            <h6 class="text-success">Sujet:</h6>
            <h5>{{ visite.sujet }}</h5>
          </div>
          <div class="col-md-6"><br>
            <h6 class="text-success">Note:</h6>
            <h5>{{ visite.note }}</h5>
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
          visite:'',
        }
      },

      computed:{
        visiteId: function(){
          return this.$route.params.id
        }
      },
      created(){
        axios.get('/visites/'+this.visiteId)
          .then(response => {
            this.visite = response.data;
        });
      }
    }
</script>

<style lang="css">
</style>
