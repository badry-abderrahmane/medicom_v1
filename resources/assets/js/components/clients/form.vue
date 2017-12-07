<template lang="html">
  <div class="">
    <h5>Form</h5>
    <h5 v-if="$route.params.id">Id: {{ $route.params.id }}</h5>
  </div>
</template>

<script>
export default {
}
</script>

<style lang="css">
</style>
