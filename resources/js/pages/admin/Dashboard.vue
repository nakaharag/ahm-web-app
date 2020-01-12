<template>
    <div class="container">
        <h3>Olá está logado como administrador do sistema</h3>
        <div class="card card-default">
            <div class="card-header">Lista de usuários</div>
            <div class="card-body">
                <userList></userList>
            </div>
        </div>
        <div class="card card-default">
            <div class="card-header">Lista de clientes</div>
            <div class="card-body">
                <clientList></clientList>
            </div>
        </div>
    </div>
</template>
<script>
  import userList from '../../components/user-list.vue'
  import clientList from '../../components/client-list.vue'
  export default {
    mounted() {
      //
    },
    components: {
      userList,
      clientList
    }
  }
</script>