<template>
<div>
    <div class="alert alert-danger" v-if="has_error">
        <p>Ocorreu um erro ao ler os detalhes de usuário</p>
    </div>
    <div v-if="user">
      <table class="table">
          <tr>
              <th scope="col">Nome</th>
              <th scope="col">E-mail</th>
              <th scope="col">Whats</th>
              <th scope="col">Data de cadastro</th>
              <th scope="col">Ações</th>
          </tr>
          <tr style="margin-bottom: 5px;">
              <th scope="row">{{ user.nome }}</th>
              <td>{{ user.email }}</td>
              <td>{{ user.whats }}</td>
              <td>{{ user.created_at | moment }}</td>
              <td @click.prevent="deleteUser" ><a href="#"> Apagar</a></td>
          </tr>
      </table>
    </div>
    <div v-else>Carregando...</div>
</div>
</template>
<script>
  export default {
    data() {
      return {
        has_error: false,
        user: null
      }
    },
    mounted() {
      this.getUser()
    },
    methods: {
      getUser() {
        axios
            .get(`/users/${this.$route.params.userId}`)
            .then(response => {
                this.user = response.data.user
                console.log(this.user)
            });
      },
      deleteUser(){
        axios
            .delete(`/users/${this.$route.params.userId}`)
            .then(response => {
              console.log(response)
                if(response.statusText == 'OK') {
                  //router.go(-1)
                  this.$router.go(-1)
                }
            });
      }
    }

  }
</script>
<style scoped>
    a {
        display: contents;
    }
</style>