<template lang="html">
  <div class="panel panel-primary card-view">
		<div class="panel-heading">
			<div class="pull-left">
				<h6 class="panel-title txt-light">Bienvenue</h6>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="panel-wrapper collapse in">
			<div class="panel-body">
        <h5>Bonjour <strong>{{ user.name }}</strong></h5><br>
        <blockquote>Bienvenue dans la première version de l'application <strong>MediCom v1.0</strong>.<br> Développée par <strong>Badry Abderrahmane.</strong> <br>En partenariat avec le Leader du marché d'impression<mark>HS Print Service</mark>.</blockquote>
        <blockquote>Vous avez besoin d'aide? <strong class="text-success">Appelez vite le 06 222 0 444 8</strong>.<br> Ou bien demandez une <strong class="text-primary">Formation Présentielle</strong>.</blockquote>
			</div>
		</div>
	</div>
</template>

<script>
export default {
  data(){
    return {
      user:'',
    }
  },
  created(){
    axios.get('/wayway')
      .then(response => {
        this.user = response.data;
    });
  }
}
</script>

<style lang="css">
</style>
