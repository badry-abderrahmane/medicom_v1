<template lang="html">
  <div class="col-sm-offset-4 col-sm-4">
    <label class="label">&nbsp;</label>
    <button type="submit"
            v-bind:class="[editing ? 'btn-warning' : 'btn-primary', 'btn  btn-block']"
            >
            <span class="icon is-small">
              <i v-bind:class="[editing ? 'fa-refresh' : 'fa-save', 'fa']"></i>
            </span>&nbsp;&nbsp;&nbsp;
            {{ editing ? 'Mettre à jour' : 'Enregistrer' }}&nbsp;&nbsp;&nbsp;
    </button>
  </div>
</template>

<script>
export default {
  props:["value","editing"],
}
</script>

<style lang="css">
</style>
