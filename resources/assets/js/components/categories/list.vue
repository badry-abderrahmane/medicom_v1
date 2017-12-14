<template lang="html">
  <table-warper>
    <div class="table-responsive" slot="content">
      <datatable-buttons>
        <tr slot="thead">
          <th width="12%">#ID</th>
          <th width="30%">Nom</th>
          <th>Nombre produits</th>
          <th width="15%">Action</th>
        </tr>
        <tr slot="tbody" v-for="category in categories">
          <td>{{ category.id }}</td>
          <td>{{ category.name }}</td>
          <td>{{ category.produits.count }}</td>
          <td>
            <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/categories/show/`+category.id })"><i class="fa fa-eye"></i></button>
            <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/categories/edit/`+category.id })"><i class="fa fa-pencil"></i></button>
            <button class="btn btn-default btn-icon-anim btn-circle" @click="$router.push({ path: `/categories/delete/`+category.id })"><i class="fa fa-trash"></i></button>
          </td>
        </tr>
      </datatable-buttons>
    </div>
  </table-warper>
</template>

<script>
export default {
  data(){
    return {
      categories:  [],
    }
  },

  created(){
    axios.get('/categories')
      .then(response => {
        this.categories = response.data;
        Vue.nextTick(function () {
          Event.$emit('init-datatable', 'tableAdd');
        })
    });
  }
}
</script>

<style lang="css">
</style>
