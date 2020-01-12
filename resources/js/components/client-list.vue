<template>
<div>
    <div class="alert alert-danger" v-if="has_error">
        <p>Ocorreu um erro ao ler a lista de clientes</p>
    </div>
    <table class="table">
        <tr>
            <th scope="col">Empresa</th>
            <th scope="col">Responsável</th>
            <th scope="col">Setor</th>
            <th scope="col">Empresa</th>
            <th scope="col">E-mail</th>
            <th scope="col">Whats</th>
            <th scope="col">Data de cadastro</th>
        </tr>
        <tr v-for="user in users" v-bind:key="user.id" style="margin-bottom: 5px;">
            <router-link :to="{ name: 'user', params: { userId: user.id }}">
                <th scope="row">{{ user.nome }}</th>
                <td>{{ user.email }}</td>
                <td>{{ user.whats }}</td>
                <td>{{ user.created_at}}</td>
            </router-link>
        </tr>
    </table>
</div>
</template>
<script>
  export default {
    data() {
      return {
        has_error: false,
        users: null
      }
    },
    mounted() {
      this.getUsers()
    },
    methods: {
      getUsers() {
        this.$http({
          url: `users`,
          method: 'GET'
        })
            .then((res) => {
              this.users = res.data.users
            }, () => {
              this.has_error = true
            })
      }
    }
  }
</script>
<style scoped>
    a {
        display: contents;
    }
</style>