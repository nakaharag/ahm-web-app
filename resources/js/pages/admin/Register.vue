<template>
    <div class="container">
        <div class="card card-default">
            <div class="card-header">Novo usuário</div>
            <div class="card-body">
                <div class="alert alert-danger" v-if="has_error && !success">
                    <p v-if="error == 'registration_validation_error'">Confira novamente por favor</p>
                    <p v-else>Não foi possível cadastrar. Tente novamente ou contate o suporte</p>
                </div>
                <form autocomplete="off" @submit.prevent="register" v-if="!success" method="post">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.nome }">
                          <label for="nome">Nome</label>
                          <input type="text" id="nome" class="form-control" placeholder="Ex: João da Silva" v-model="nome">
                          <span class="help-block" v-if="has_error && errors.nome">{{ errors.nome }}</span>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.email }">
                          <label for="email">E-mail</label>
                          <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="email">
                          <span class="help-block" v-if="has_error && errors.email">{{ errors.email }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-2">
                      <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.role }">
                          <label for="role">Perfil</label>
                          <select class="form-control" name="role" id="role" v-model="role">
                            <option value=2>Admin</option>
                            <option value=1>Usuario</option>
                          </select>
                          <span class="help-block" v-if="has_error && errors.role">{{ errors.role }}</span>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.whats }">
                          <label for="whats">Whatsapp</label>
                          <the-mask :mask="['(##) ####-####', '(##) #####-####']" class="form-control" id="whats" v-model="whats" placeholder="(99) 99999-9999"/>
                          <span class="help-block" v-if="has_error && errors.whats">{{ errors.whats }}</span>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.password }">
                          <label for="password">Senha</label>
                          <input type="password" id="password" class="form-control" placeholder="Mínimo de 5 caracteres" v-model="password">
                          <span class="help-block" v-if="has_error && errors.password">{{ errors.password }}</span>
                      </div>
                    </div>
                      <div class="col-3">
                        <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.password }">
                            <label for="password_confirmation">Confirmação de senha</label>
                            <input type="password" id="password_confirmation" class="form-control" placeholder="Confirme a senha" v-model="password_confirmation">
                        </div>
                      </div>
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
        nome: '',
        email: '',
        whats: '',
        role: '',
        password: '',
        password_confirmation: '',
        has_error: false,
        error: '',
        errors: {},
        success: false
      }
    },
    methods: {
      register() {
        var app = this
        this.$auth.register({
          data: {
            nome: app.nome,
            role: app.role,
            email: app.email,
            password: app.password,
            whats: app.whats,
            password_confirmation: app.password_confirmation
          },
          success: function () {
            app.success = true
            this.$router.go(-1)
            //this.$router.push({name: 'admin.dashboard', params: {successRegistrationRedirect: true}})
          },
          error: function (res) {
            console.log(res.response.data.errors)
            app.has_error = true
            app.error = res.response.data.error
            app.errors = res.response.data.errors || {}
          }
        })
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
