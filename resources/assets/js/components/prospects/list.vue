<template lang="html">
  <table-warper>
    <div class="table-responsive" slot="content">
      <datatable-buttons>
        <tr slot="thead">
          <th width="12%">#ID</th>
          <th width="30%">Nom</th>
          <th>Telephone</th>
          <th>Adresse</th>
          <th width="15%">Action</th>
        </tr>
        <tr slot="tbody" v-for="client in clients">
          <td>{{ client.id }}</td>
          <td>{{ client.name }}</td>
          <td>{{ client.phone }}</td>
          <td>{{ client.adress }}</td>
          <td>
            <button class="btn btn-default btn-icon-anim btn-circle"><i class="fa fa-eye"></i></button>
            <button class="btn btn-default btn-icon-anim btn-circle"><i class="fa fa-pencil"></i></button>
            <button class="btn btn-default btn-icon-anim btn-circle"><i class="fa fa-trash"></i></button>
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
      clients:  [
        { id: '1', name: 'Badry Abdo', phone: '06022885566', adress: '12 Casablanca'},
        { id: '2', name: 'Badry Abdo', phone: '06022885566', adress: '12 Casablanca'},
        { id: '3', name: 'Badry Abdo', phone: '06022885566', adress: '12 Casablanca'},
        { id: '4', name: 'Badry Abdo', phone: '06022885566', adress: '12 Casablanca'},
      ],
    }
  }
}
</script>

<style lang="css">
</style>
