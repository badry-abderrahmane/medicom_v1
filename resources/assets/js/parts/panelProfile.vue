<template lang="html">
  <div class="panel panel-default card-view  pa-0">
		<div class="panel-wrapper collapse in">
			<div class="panel-body  pa-0">
				<div class="profile-box">
					<div class="profile-info text-center">
						<h5 class="block mt-10 mb-5 weight-500 capitalize-font text-warning">{{ title }}</h5>
						<h6 class="block capitalize-font pb-20">{{ name }}</h6>
					</div>
					<div class="social-info">
						<div class="row">
							<div class="col-xs-4 text-center">
                <slot name="count1"></slot>
							</div>
							<div class="col-xs-4 text-center">
                <slot name="count2"></slot>
							</div>
							<div class="col-xs-4 text-center">
                <slot name="count3"></slot>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
  props:["title","name"]
}
</script>

<style lang="css">
</style>
