<template lang="html">
  <div class="row heading-bg" >
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h4 class="txt-dark">{{ $route.name }}</h4>
		</div>
		<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" v-show="$route.name != 'Tableau de bord'">
			<ol class="breadcrumb">
				<li><a style="cursor:pointer;" @click="$router.push({ path: `/` })">Tableau de bord</a></li>
				<li class="active"><span>{{ $route.name }}</span></li>
			</ol>
		</div>
		<!-- /Breadcrumb -->
	</div>
</template>

<script>
export default {
}
</script>

<style lang="css">
</style>
