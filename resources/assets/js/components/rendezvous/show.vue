<template lang="html">
  <div>
    <part-panel>
      <div slot="heading">
        Détail Rendez-Vous
      </div>
      <div  slot="body">
        <div class="row">
          <div class="col-md-6"><br>
            <h6 class="text-success">Date:</h6>
            <h5>{{ rendezvou.date }}</h5>
          </div>
          <div class="col-md-6"><br>
            <h6 class="text-success">Prospect:</h6>
            <h5>{{ rendezvou.prospect.name }}</h5>
          </div>
          <div class="col-md-6"><br>
            <h6 class="text-success">Status:</h6>
            <h5>{{ rendezvou.status }}</h5>
          </div>
          <div class="col-md-6"><br>
            <h6 class="text-success">Type:</h6>
            <h5>{{ rendezvou.type }}</h5>
          </div>
          <div class="col-md-6"><br>
            <h6 class="text-success">Sujet:</h6>
            <h5>{{ rendezvou.sujet }}</h5>
          </div>
          <div class="col-md-6"><br>
            <h6 class="text-success">Note:</h6>
            <h5>{{ rendezvou.note }}</h5>
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
          rendezvou:{},
        }
      },

      computed:{
        rendezvouId: function(){
          return this.$route.params.id
        }
      },
      created(){
        axios.get('/rendezvous/'+this.rendezvouId)
          .then(response => {
            this.rendezvou = response.data;
        });
      }
    }
</script>

<style lang="css">
</style>
