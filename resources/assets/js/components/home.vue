<template lang="html">
  <div class="wrapper theme-1-active box-layout pimary-color-green">
	  <global-navbar></global-navbar>
	  <global-sidebar></global-sidebar>
	  <global-optionbar></global-optionbar>
    <div class="right-sidebar-backdrop"></div>
	  <div class="page-wrapper">
      <div class="container-fluid pt-25">
        <router-view></router-view>
      </div>
      <global-footer></global-footer>
    </div>
</div>
</template>

<script>
export default {
}
</script>

<style lang="css">
</style>
