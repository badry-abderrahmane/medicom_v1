<template>
  <div class="column is-3">
    <select2 :options="list" :name="name" v-model="value" @input="$emit('input', value)"></select2>
    <!-- <span class="help">{{ help }}</span> -->
    <!-- <div class="help is-danger" v-if="value.errors.has(name)" v-text="value.errors.get(name)"></div> -->
  </div>
</template>
<script>
  export default {
    props:["value","name","list"],
    mounted(){
      $('.select2-container--default .select2-selection--single').css({"border-color":"#00d1b2"});
    },
    updated(){
      // if (this.value.errors.has(this.name)) {
      //   $('.select2-container--default .select2-selection--single').css({"border-color":"#ff3860"});
      // }else{
      //   $('.select2-container--default .select2-selection--single').css({"border-color":"#00d1b2"});
      // }
    },
    methods:{
      
    }
  }
</script>
