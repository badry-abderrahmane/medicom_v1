<template lang="html">
  <div>
    <div class="row">
      <div class="col-md-6"><br>
        <h6 class="text-success">#ID:</h6>
        <h5><span class="label label-default">{{ fournisseur.id }}</span></h5>
      </div>
      <div class="col-md-6"><br>
        <h6 class="text-success">Nom:</h6>
        <h5>{{ fournisseur.name }}</h5>
      </div>
      <div class="col-md-6"><br>
        <h6 class="text-success">Telephone:</h6>
        <h5>{{ fournisseur.phone }}</h5>
      </div>
      <div class="col-md-6"><br>
        <h6 class="text-success">Adresse:</h6>
        <h5>{{ fournisseur.adress }}</h5>
      </div>
      <div class="col-md-6"><br>
        <h6 class="text-success">Spécialité:</h6>
        <h5>{{ fournisseur.specialite }}</h5>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <button class="btn btn-success btn-block btn-outline btn-anim mt-30" @click="$router.push({ path: `/fournisseurs/edit/`+fournisseur.id })">
          <i class="fa fa-pencil"></i>
          <span class="btn-text">Modifier les informations</span>
        </button><br>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props:["fournisseur"]
}
</script>

<style lang="css">
</style>
