<template lang="html">
  <div class="panel panel-default card-view pa-0">
  	<div class="panel-wrapper collapse in">
  		<div class="panel-body pb-0">
  			<div class="tab-struct custom-tab-1">
  				<ul role="tablist" class="nav nav-tabs nav-tabs-responsive" id="myTabs_8">
            <li role="presentation" v-for="tab,key in tabs" :class="key == 0 ? 'active':''">
              <a data-toggle="tab" :id="tab.id+'_tab_8'" role="tab" :href="'#'+tab.id" aria-expanded="false">
                <span>{{ tab.name }}</span>
              </a>
            </li>
  				</ul>
  				<div class="tab-content" id="myTabContent_8" style="min-height:300px !important;">
  					<div v-for="tab,key in tabs" :id="tab.id" :class="key == 0 ? 'tab-pane fade active in':'tab-pane fade'" role="tabpanel">
              <slot :name="tab.id"></slot>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>
</template>

<script>
export default {
  props:["tabs"]
}
</script>

<style lang="css">
</style>
