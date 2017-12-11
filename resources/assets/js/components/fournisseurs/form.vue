<template lang="html">
  <div>
    <part-panel>
      <div slot="heading">
        Nouveau client
      </div>
      <form v-on:submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)" slot="body">
        <div class="row">
          <part-input v-model="form" name="name" label="Nom complet/Raison sociale"></part-input>
          <part-input v-model="form" name="phone" label="Numéro téléphone"></part-input>
          <part-input v-model="form" name="adress" label="Adresse"></part-input>
          <part-input v-model="form" name="specialite" label="Spécialité"></part-input>
        </div>
        <div class="row">
          <part-button-submit :editing="editing"></part-button-submit>
        </div>
      </form>
    </part-panel>
  </div>
</template>

<script>
    import { Form } from './../../api/form.js';
    export default {
        data(){
          return{
            form : new Form({
              id:'',
              name: '',
              phone: '',
              adress: '',
              activite: '',
            }),
          }
        },
        computed:{
          editing: function(){
            if (this.$route.params.id) {
              return true
            }else{
              return false
            }
          },
        },
        created(){

        },

        methods: {

        }
    }
</script>

<style lang="css">
</style>
