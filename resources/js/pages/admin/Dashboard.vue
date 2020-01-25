<template>
    <div class="container">
        <p>Olá, você está logado como administrador do sistema</p>
        <div class="card card-default p-1">
            <div class="card-header">Lista de clientes</div>
            <div class="card-body">
                <companyList></companyList>
            </div>
        </div>
        <div class="card card-default p-1 mb-2">
            <div class="card-header">Lista de usuários</div>
            <div class="card-body">
                <userList></userList>
            </div>
        </div>
    </div>
</template>
<script>
  import userList from '../../components/user-list.vue'
  import companyList from '../../components/company-list.vue'
  export default {
    mounted() {
      //
    },
    components: {
      userList,
      companyList
    }
  }
</script>