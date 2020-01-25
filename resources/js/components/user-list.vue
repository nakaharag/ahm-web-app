<template>
<div>
    <div class="alert alert-danger" v-if="has_error">
        <p>Ocorreu um erro ao ler a lista de usuários</p>
    </div>
    <div class="row">
        <div class="search-wrapper panel-heading col-sm-12 pb-2">
            <input class="form-control" type="text" v-model="search" placeholder="Procurar" />
        </div>                        
    </div>
    <div id="list-users" v-if="users && users.length">
      <table class="table">
          <tr>
              <th scope="col">Nome</th>
              <th scope="col">E-mail</th>
              <th scope="col">Whats</th>
              <th scope="col">Perfil</th>
              <th scope="col">Empresa</th>
          </tr>
        
              <tr v-for="user in usersFilter" v-bind:key="user.id" style="margin-bottom: 5px;">
                  <router-link :to="{ name: 'user', params: { userId: user.id }}">
                      <th scope="row">{{ user.nome }}</th>
                      <td>{{ user.email }}</td>
                      <td>{{ user.whats }}</td>
                      <td v-if='user.role == 1'>Usuário comum</td>
                      <td v-else-if='user.role == 3'>Cliente</td>
                      <td v-else>Admin</td>
                      <td>{{ user.company.empresa }}</td>
                  </router-link>
              </tr>
          
      </table>
    </div>
    <div class="text-center" v-else>
      Nenhum resultado encontrado
    </div>
</div>
</template>
<script>
  export default {
    data() {
      return {
        has_error: false,
        users: null,
        search: "",
      }
    },
    computed: {
      usersFilter: function() {
        var search = this.search;
        return this.users.filter(function(el) {
          return el.nome.toLowerCase().indexOf(search.toLowerCase()) !== -1;
        });
      }
    },
    created() {
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
</script>
<style scoped>
    a {
        display: contents;
    }
</style>