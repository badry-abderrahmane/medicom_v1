<template lang="html">
  <div>
    <div class="col-md-3">
      <part-panel-profile title="Catégorie" :name="category.name">
        <div slot="count1">
          <span class="counts block head-font"><span class="counter-anim">{{ countProduits }}</span></span>
          <span class="counts-text block">Produits</span>
        </div>
        <div slot="count2">
          <span class="counts block head-font"><span class="counter-anim">{{ countProduits }}</span></span>
          <span class="counts-text block">Produits</span>
        </div>
      </part-panel-profile>
    </div>
    <div class="col-md-9">
      <part-panel-tabs :tabs="tabs">
        <div slot="1" class="text-center"><br>
          <infos-category :category="category"></infos-category>
        </div>
        <div slot="2">
          <infos-category-produits :produits="category.produits"></infos-category-produits>
        </div>
      </part-panel-tabs>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return {
      tabs: [
        {id: '1', name: 'Informations'},
        {id: '2', name: 'Produits'},
      ],
      category:{}
    }
  },

  computed:{
    categoryId: function(){
      return this.$route.params.id
    },
    countProduits: function(){
      if (this.category.produits) {
        return this.category.produits.length
      }else{
        return 0
      }
    },
  },
  created(){
    axios.get('/categories/'+this.categoryId)
      .then(response => {
        this.category = response.data;
        Vue.nextTick(function () {
          Event.$emit('init-datatable', 'tableAdd');
        })
    });
  }
}
</script>

<style lang="css">
</style>
