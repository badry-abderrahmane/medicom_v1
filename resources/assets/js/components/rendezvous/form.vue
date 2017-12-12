<template lang="html">
  <div>
    <part-panel>
      <div slot="heading">
        Nouveau Rendez-Vous
      </div>
      <div  slot="body">
        <form v-on:submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)" slot="body">
          <div class="row">
            <div class="col-sm-6">
							<div class="form-group">
								<label class="control-label mb-10 text-left">Date du rendez vous</label>
								<div class="input-group date" id="datetimepicker1">
									<input type="text" class="form-control" name="date" id="date" v-model="form['date']">
									<span class="input-group-addon">
										<span class="fa fa-calendar"></span>
									</span>
								</div>
							</div>
						</div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="Fournisseur" class="control-label mb-10">Prospect</label>
                <model-select name="prospect_id" :options="[{value:1,text:'Prospect 1'},{value:2,text:'Prospect 2'},{value:3,text:'Prospect 3'}]" v-model="form['prospect_id']" placeholder="Choisir prospect..">
               </model-select>
              </div>
            </div>
            <part-input v-model="form" name="sujet" label="Sujet"></part-input>
            <div class="col-md-6">
              <div class="form-group">
                <label for="Fournisseur" class="control-label mb-10">Type</label>
                <model-select name="type" :options="[{value:1,text:'Faible'},{value:2,text:'Moyen'},{value:3,text:'Elevé'}]" v-model="form['type']" placeholder="Choisir prospect..">
               </model-select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="Fournisseur" class="control-label mb-10">Status</label>
                <model-select name="status" :options="[{value:1,text:'En attente'},{value:2,text:'Passé'}]" v-model="form['status']" placeholder="Choisir prospect..">
               </model-select>
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
              prospect_id: '',
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
          rendezvouId: function(){
            return this.$route.params.id
          }
        },
        created(){
          if (this.rendezvouId) {
            axios.get('/rendezvous/'+this.rendezvouId)
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
          });
        },

        methods: {
          onSubmit(){
            if (this.form.id == '') {
              this.form.post('/rendezvous')
                .then(data => {
                  Event.$emit('publish-success-message', data.message);
                  this.goback();
                })
                .catch(errors =>{
                  console.log(errors);
                });
            }else{
              this.form.put('/rendezvous')
                .then(data => {
                  Event.$emit('publish-success-message', data.message);
                  this.goback();
                })
                .catch(errors => {
                  console.log(errors);
                });
            }
          },

          goback(){
              this.$router.go(-1);
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
