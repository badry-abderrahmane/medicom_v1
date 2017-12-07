<template lang="html">
  <div>
    <div class="col-md-6"><br>
      <h6 class="text-success">#ID:</h6>
      <h5><span class="label label-default">{{ client.id }}</span></h5>
    </div>
    <div class="col-md-6"><br>
      <h6 class="text-success">Nom:</h6>
      <h5>{{ client.name }}</h5>
    </div>
    <div class="col-md-6"><br>
      <h6 class="text-success">Telephone:</h6>
      <h5>{{ client.phone }}</h5>
    </div>
    <div class="col-md-6"><br>
      <h6 class="text-success">Adresse:</h6>
      <h5>{{ client.adress }}</h5>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4"><br>
        <button class="btn btn-success btn-block btn-outline btn-anim mt-30" @click="$router.push({ path: `/clients/edit/`+client.id })">
          <i class="fa fa-pencil"></i>
          <span class="btn-text">Modifier les informations</span>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props:["client"]
}
</script>

<style lang="css">
</style>
