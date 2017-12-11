<template lang="html">
  <div>
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <part-panel-danger>
        <h6 class="panel-title txt-light" slot="heading">Suppression Devis</h6>
        <div slot="body">
          <h4 class="text-danger text-center">Etes vous sur de vouloir supprimer ce devis?</h4>
          <div class="row"><br><br>
            <div class="col-md-2"></div>
            <div class="col-md-4">
              <button class="btn btn-danger btn-block">Supprimer&nbsp;&nbsp;</button>
            </div>
            <div class="col-md-4">
              <button class="btn btn-default btn-block" @click="$router.push({ path: `/devis`})">Annuler</button>
            </div>
          </div>
          <h5>{{$route.params.id}}</h5>
        </div>
      </part-panel-danger>
    </div>
  </div>
</template>

<script>
export default {
}
</script>

<style lang="css">
</style>
