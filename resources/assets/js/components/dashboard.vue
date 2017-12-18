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
        <div class="alert alert-warning alert-dismissable alert-style-1">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<i class="zmdi zmdi-alert-circle-o"></i>Aidez nous à corriger toute anomalie en envoyant un imprimé écran de l'erreur et/ou mauvaise interaction.<br> Vers l'adresse email suivante <strong>medimall.dev@gmail.com</strong>
				</div>
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
