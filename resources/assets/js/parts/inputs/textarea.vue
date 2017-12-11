<template lang="html">
  <div class="col-md-6">
    <div v-bind:class="[ value.errors.get(name) ? 'has-error' : '', 'form-group']">
      <label :for="name" class="control-label mb-10">{{ label }}</label>
      <textarea class="form-control" rows="5" :id="name" :name="name" v-model="value[name]"></textarea>
      <div class="help-block" v-if="value.errors.has(name)" v-text="value.errors.get(name)"></div>
    </div>
  </div>
</template>

<script>
export default {
  props:["value","name","label"],
}
</script>

<style lang="css">
</style>
