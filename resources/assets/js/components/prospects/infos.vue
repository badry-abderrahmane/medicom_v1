<template lang="html">
  <div>
    <div class="row">
      <div class="col-md-6"><br>
        <h6 class="text-success">#ID:</h6>
        <h5><span class="label label-default">{{ prospect.id }}</span></h5>
      </div>
      <div class="col-md-6"><br>
        <h6 class="text-success">Nom:</h6>
        <h5>{{ prospect.name }}</h5>
      </div>
      <div class="col-md-6"><br>
        <h6 class="text-success">Telephone:</h6>
        <h5>{{ prospect.phone }}</h5>
      </div>
      <div class="col-md-6"><br>
        <h6 class="text-success">Adresse:</h6>
        <h5>{{ prospect.adress }}</h5>
      </div>
      <div class="col-md-6"><br>
        <h6 class="text-success">Activité:</h6>
        <h5>{{ prospect.activite }}</h5>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <button class="btn btn-success btn-block btn-outline btn-anim mt-30" @click="$router.push({ path: `/prospects/edit/`+prospect.id })">
          <i class="fa fa-pencil"></i>
          <span class="btn-text">Modifier les informations</span>
        </button><button class="btn btn-danger btn-block btn-outline btn-anim mt-30" @click="convertProspect(prospect.id)">
          <i class="fa fa-plus"></i>
          <span class="btn-text">Ajouter à la liste des clients</span>
        </button><br>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props:["prospect"],
  methods:{
    convertProspect(id){
          var self = this;
          axios.post('/convert/prospect/'+id)
          .then(function (response) {
            self.$store.dispatch('LOAD_CLIENT_LIST')
            Event.$emit('publish-success-message', data.message);
          })
          .catch(function (error) {
            self.$store.dispatch('LOAD_CLIENT_LIST')
            Event.$emit('publish-danger-message', 'Le prospect existe déja dans la liste des clients');
          });
    }
  }
}
</script>

<style lang="css">
</style>
