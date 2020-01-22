<template>
      <div class="container">
        <div class="card card-default">
            <div class="card-header">Nova Empresa</div>
            <div class="card-body">
                <div class="alert alert-danger" v-if="has_error && !success">
                    <p v-if="error == 'registration_validation_error'">Confira novamente por favor</p>
                    <p v-else>Não foi possível cadastrar. Tente novamente ou contate o suporte</p>
                </div>
                <form autocomplete="off" @submit.prevent="register" v-if="!success" method="post">
                    <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.empresa }">
                        <label for="empresa">Nome da Empresa</label>
                        <input type="text" id="empresa" class="form-control" placeholder="Ex: Internet LTDA" v-model="empresa">
                        <span class="help-block" v-if="has_error && errors.empresa">{{ errors.empresa }}</span>
                    </div>
                    <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.responsavel }">
                        <label for="responsavel">Responsável</label>
                        <input type="text" id="responsavel" class="form-control" placeholder="Ex: João da Silva" v-model="responsavel">
                        <span class="help-block" v-if="has_error && errors.responsavel">{{ errors.responsavel }}</span>
                    </div>
                    <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.setor }">
                        <label for="setor">Setor</label>
                        <input type="text" id="setor" class="form-control" placeholder="Ex: Administrativo" v-model="setor">
                        <span class="help-block" v-if="has_error && errors.setor">{{ errors.setor }}</span>
                    </div>
                    <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.email }">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="email">
                        <span class="help-block" v-if="has_error && errors.email">{{ errors.email }}</span>
                    </div>
                    <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.whats }">
                        <label for="whats">Whatsapp</label>
                        <input type="text" id="whats" class="form-control" placeholder="(99) 99999-9999" v-model="whats">
                        <span class="help-block" v-if="has_error && errors.whats">{{ errors.whats }}</span>
                    </div>
                    <button type="submit" class="btn btn-dark">Enviar</button>
                    <router-link v-if="$auth.check(2)" :to="{ name: 'admin-dashboard'}">Voltar</router-link>
                    <router-link v-else :to="{ name: 'dashboard'}">Voltar</router-link>
                </form>
            </div>
        </div>
      </div>
</template>
<script>
  export default {
    data() {
      return {
        empresa: '',
        email: '',
        responsavel: '',
        setor: '',
        whats: '',
        has_error: false,
        error: '',
        errors: {},
        success: false
      }
    },
    methods: {
      register() {
        var app = this
        var data = {
            empresa: app.empresa,
            responsavel: app.responsavel,
            email: app.email,
            setor: app.setor,
            whats: app.whats
          }
          axios.post('registerCompany/', data
      ).catch(function (error) {
        console.log(error);
      }).then(
        this.$router.go(-1)
      );
        
        // this.$auth.registerCompany({
        //   data: {
        //     empresa: app.empresa,
        //     responsavel: app.responsavel,
        //     email: app.email,
        //     setor: app.setor,
        //     whats: app.whats
        //   },
        //   success: function () {
        //     app.success = true
        //     this.$router.go(-1)
        //     //this.$router.push({name: 'admin.dashboard', params: {successRegistrationRedirect: true}})
        //   },
        //   error: function (res) {
        //     console.log(res.response.data.errors)
        //     app.has_error = true
        //     app.error = res.response.data.error
        //     app.errors = res.response.data.errors || {}
        //   }
        // })
      }
    }
  }
</script>
<style scoped>
  a { 
    border: 1px solid #73738c;
    padding: 8px;
    margin: 10px;
    background-color: #73738c;
    color: #FFF;
    border-radius: 5px;
    float: right;
  }
  a:hover{
    background-color: #565658;
    text-decoration: none;
    color: #FFF;
  }
</style>
