<template lang="html">
  <table id="datatable">
    <thead>
      <slot name="thead"></slot>
    </thead>
    <tbody>
      <slot name="tbody"></slot>
    </tbody>
  </table>
</template>

<script>
export default {
  mounted(){
    Vue.nextTick(function () {
      Event.$emit('init-datatable', 'tableAdd');
    })
  }
}
</script>

<style lang="css">
</style>
