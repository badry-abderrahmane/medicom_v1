<template lang="html">
  <div>
    <div class="row">
      <div class="col-md-6"><br>
        <h6 class="text-success">#ID:</h6>
        <h5><span class="label label-default">{{ category.id }}</span></h5>
      </div>
      <div class="col-md-6"><br>
        <h6 class="text-success">Nom:</h6>
        <h5>{{ category.name }}</h5>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <button class="btn btn-success btn-block btn-outline btn-anim mt-30" @click="$router.push({ path: `/categories/edit/`+category.id })">
          <i class="fa fa-pencil"></i>
          <span class="btn-text">Modifier les informations</span>
        </button><br>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props:["category"]
}
</script>

<style lang="css">
</style>
