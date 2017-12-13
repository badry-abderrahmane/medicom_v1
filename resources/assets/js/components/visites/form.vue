<template lang="html">
  <div>
    <part-panel>
      <div slot="heading">
        Nouvelle visite
      </div>
      <div  slot="body">
        <form v-on:submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)" slot="body">
          <div class="row">
            <div class="col-sm-6">
							<div v-bind:class="[ form.errors.get('date') ? 'has-error' : '', 'form-group']">
								<label class="control-label mb-10 text-left">Date de la visite</label>
								<div class="input-group date" id="datetimepicker1">
									<input type="text" class="form-control" name="date" id="date" v-model="form['date']">
									<span class="input-group-addon">
										<span class="fa fa-calendar"></span>
									</span>
								</div>
                <div class="help-block" v-if="form.errors.has('date')" v-text="form.errors.get('date')"></div>
							</div>
						</div>
            <div class="col-md-6">
              <div v-bind:class="[ form.errors.get('client_id') ? 'has-error' : '', 'form-group']">
                <label for="Fournisseur" class="control-label mb-10">Client</label>
                <model-select :options="[{value:1,text:'Client 1'},{value:2,text:'Client 2'},{value:3,text:'Client 3'}]" v-model="form['client_id']" placeholder="Choisir client.." @input="clearThis('client_id')">
               </model-select>
               <div class="help-block" v-if="form.errors.has('client_id')" v-text="form.errors.get('client_id')"></div>
              </div>
            </div>
            <part-input v-model="form" name="sujet" label="Sujet"></part-input>
            <div class="col-md-6">
              <div v-bind:class="[ form.errors.get('type') ? 'has-error' : '', 'form-group']">
                <label for="Fournisseur" class="control-label mb-10">Type</label>
                <model-select :options="[{value:1,text:'Faible'},{value:2,text:'Moyen'},{value:3,text:'Elevé'}]" v-model="form['type']" placeholder="Choisir type.." @input="clearThis('type')">
               </model-select>
               <div class="help-block" v-if="form.errors.has('type')" v-text="form.errors.get('type')"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div v-bind:class="[ form.errors.get('status') ? 'has-error' : '', 'form-group']">
                <label for="Fournisseur" class="control-label mb-10">Status</label>
                <model-select :options="[{value:1,text:'En attente'},{value:2,text:'Passé'}]" v-model="form['status']" placeholder="Choisir status.." @input="clearThis('status')">
               </model-select>
               <div class="help-block" v-if="form.errors.has('status')" v-text="form.errors.get('status')"></div>
              </div>
            </div>
            <part-textarea v-model="form" name="note" label="Note"></part-textarea>
          </div>
          <div class="row">
            <part-button-submit :editing="editing"></part-button-submit>
          </div>
        </form>
      </div>
    </part-panel>
  </div>
</template>

<script>
    import { ModelSelect } from 'vue-search-select'
    import { Form } from './../../api/form.js';
    export default {
        components: {
          ModelSelect
        },
        data(){
          return{
            form : new Form({
              id:'',
              date: '',
              client_id: '',
              sujet: '',
              type: '',
              status: '',
              note: '',
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
          visiteId: function(){
            return this.$route.params.id
          }
        },
        created(){
          if (this.visiteId) {
            axios.get('/visites/'+this.visiteId)
              .then(response => {
                this.form.load(response.data);
            });
          }
        },
        mounted(){
          /* Datetimepicker Init*/
        	$('#datetimepicker1').datetimepicker({
              format: 'DD-MM-YYYY LT',
        			useCurrent: false,
        			icons: {
                  time: "fa fa-clock-o",
                  date: "fa fa-calendar",
                  up: "fa fa-arrow-up",
                  down: "fa fa-arrow-down"
              },
        		}).on('dp.show', function() {
        		if($(this).data("DateTimePicker").date() === null)
        			$(this).data("DateTimePicker").date(moment());
  	       }).on('dp.change', (event) =>  {
             this.form.date = $('#date').val();
             this.form.errors.clear('date');
          });
        },

        methods: {
          onSubmit(){
            if (this.form.id == '') {
              this.form.post('/visites')
                .then(data => {
                  Event.$emit('publish-success-message', data.message);
                  this.goback();
                })
                .catch(errors =>{
                  Event.$emit('publish-danger-message', 'Une erreur s\'est produite');
                  console.log(errors);
                });
            }else{
              this.form.put('/visites')
                .then(data => {
                  Event.$emit('publish-success-message', data.message);
                  this.goback();
                })
                .catch(errors => {
                  Event.$emit('publish-danger-message', 'Une erreur s\'est produite');
                  console.log(errors);
                });
            }
          },

          goback(){
              this.$router.go(-1);
          },

          clearThis(name){
            this.form.errors.clear(name);
          }
        }
    }
</script>


<style lang="css">
.search{
  border: 1px solid rgba(33, 33, 33, 0.12);
  border-radius: 0 !important;
  background-color: #fff;
  box-shadow: none;
  color: #212121;
  height: 42px;
}
</style>
