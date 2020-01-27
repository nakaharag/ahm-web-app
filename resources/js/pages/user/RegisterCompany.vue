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
                  <div class="row">
                    <div class="col-6">
                    <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.empresa }">
                        <label for="empresa">Nome da Empresa</label>
                        <input type="text" id="empresa" class="form-control" placeholder="Ex: Internet LTDA" v-model="empresa">
                        <span class="help-block" v-if="has_error && errors.empresa">{{ errors.empresa }}</span>
                    </div>
                    </div>
                    <div class="col-6">
                    <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.responsavel }">
                        <label for="responsavel">Responsável</label>
                        <input type="text" id="responsavel" class="form-control" placeholder="Ex: João da Silva" v-model="responsavel">
                        <span class="help-block" v-if="has_error && errors.responsavel">{{ errors.responsavel }}</span>
                    </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-6">
                    <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.setor }">
                        <label for="setor">Setor</label>
                        <input type="text" id="setor" class="form-control" placeholder="Ex: Administrativo" v-model="setor">
                        <span class="help-block" v-if="has_error && errors.setor">{{ errors.setor }}</span>
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
                    <div class="col-6">
                    <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.whats }">
                        <label for="whats">Whatsapp</label>
                        <input type="text" id="whats" class="form-control" placeholder="(99) 99999-9999" v-model="whats">
                        <span class="help-block" v-if="has_error && errors.whats">{{ errors.whats }}</span>
                    </div>
                    </div>
                    <div class="col-6">
                    <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.horas }">
                        <label for="horas">Quantidade de horas contratadas</label>
                        <input type="text" id="horas" class="form-control" placeholder="Somente números" v-model="horas">
                        <span class="help-block" v-if="has_error && errors.horas">{{ errors.horas }}</span>
                    </div>
                    </div>
                    </div>
                    <h5>Mídias Sociais:</h5>
                    <div class="row">
                      <div class="col-2">
                        <p>Facebook</p>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <label for="url_facebook">Endereço</label>
                          <input type="text" name="url_facebook" id="url_facebook" v-model="url_facebook" class="form-control">
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-group">
                          <label for="user_facebook">Login</label>
                          <input type="text" name="user_facebook" id="user_facebook" v-model="user_facebook" class="form-control">
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-group">
                          <label for="pw_facebook">Senha</label>
                          <input type="password" name="pw_facebook" id="pw_facebook" v-model="pw_facebook"  class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-2">
                        <p>Instagram</p>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <label for="url_instagram">Endereço</label>
                          <input type="text" name="url_instagram" id="url_instagram" v-model="url_instagram" class="form-control">
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-group">
                          <label for="user_instagram">Login</label>
                          <input type="text" name="user_instagram" id="user_instagram" v-model="user_instagram" class="form-control">
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-group">
                          <label for="pw_instagram">Senha</label>
                          <input type="password" name="pw_instagram" id="pw_instagram" v-model="pw_instagram"  class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-2">
                        <p>Youtube</p>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <label for="url_youtube">Endereço</label>
                          <input type="text" name="url_youtube" id="url_youtube" v-model="url_youtube" class="form-control">
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-group">
                          <label for="user_youtube">Login</label>
                          <input type="text" name="user_youtube" id="user_youtube" v-model="user_youtube" class="form-control">
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-group">
                          <label for="pw_youtube">Senha</label>
                          <input type="password" name="pw_youtube" id="pw_youtube" v-model="pw_youtube"  class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-2">
                        <p>Linkedin</p>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <label for="url_linkedin">Endereço</label>
                          <input type="text" name="url_linkedin" id="url_linkedin" v-model="url_linkedin" class="form-control">
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-group">
                          <label for="user_linkedin">Login</label>
                          <input type="text" name="user_linkedin" id="user_linkedin" v-model="user_linkedin" class="form-control">
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-group">
                          <label for="pw_linkedin">Senha</label>
                          <input type="password" name="pw_linkedin" id="pw_linkedin" v-model="pw_linkedin"  class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-2">
                        <p>Twitter</p>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <label for="url_twitter">Endereço</label>
                          <input type="text" name="url_twitter" id="url_twitter" v-model="url_twitter" class="form-control">
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-group">
                          <label for="user_twitter">Login</label>
                          <input type="text" name="user_twitter" id="user_twitter" v-model="user_twitter" class="form-control">
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-group">
                          <label for="pw_twitter">Senha</label>
                          <input type="password" name="pw_twitter" id="pw_twitter" v-model="pw_twitter"  class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-2">
                        <p>Google ADS</p>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <label for="url_googleads">Endereço</label>
                          <input type="text" name="url_googleads" id="url_googleads" v-model="url_googleads" class="form-control">
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-group">
                          <label for="user_googleads">Login</label>
                          <input type="text" name="user_googleads" id="user_googleads" v-model="user_googleads" class="form-control">
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-group">
                          <label for="pw_googleads">Senha</label>
                          <input type="password" name="pw_googleads" id="pw_googleads" v-model="pw_googleads"  class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-2">
                        <p>Hospedagem</p>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <label for="url_hospedagem">Endereço</label>
                          <input type="text" name="url_hospedagem" id="url_hospedagem" v-model="url_hospedagem" class="form-control">
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-group">
                          <label for="user_hospedagem">Login</label>
                          <input type="text" name="user_hospedagem" id="user_hospedagem" v-model="user_hospedagem" class="form-control">
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-group">
                          <label for="pw_hospedagem">Senha</label>
                          <input type="password" name="pw_hospedagem" id="pw_hospedagem" v-model="pw_hospedagem"  class="form-control">
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
        empresa: '',
        email: '',
        responsavel: '',
        setor: '',
        whats: '',
        horas: '',
        has_error: false,
        error: '',
        errors: {},
        success: false,
        url_hospedagem : '',
        user_hospedagem : '',
        pw_hospedagem : '',
        url_googleads : '',
        user_googleads : '',
        pw_googleads : '',
        url_linkedin : '',
        user_linkedin : '',
        pw_linkedin : '',
        url_twitter : '',
        user_twitter : '',
        pw_twitter : '',
        url_youtube : '',
        user_youtube : '',
        pw_youtube : '',
        url_facebook : '',
        user_facebook : '',
        pw_facebook : '',
        url_instagram : '',
        user_instagram : '',
        pw_instagram : ''
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
            whats: app.whats,
            horas: app.horas,
            url_hospedagem : app.url_hospedagem ,
            user_hospedagem : app.user_hospedagem ,
            pw_hospedagem : app.pw_hospedagem ,
            url_googleads : app.url_googleads ,
            user_googleads : app.user_googleads ,
            pw_googleads : app.pw_googleads ,
            url_linkedin : app.url_linkedin ,
            user_linkedin : app.user_linkedin ,
            pw_linkedin : app.pw_linkedin ,
            url_twitter : app.url_twitter ,
            user_twitter : app.user_twitter ,
            pw_twitter : app.pw_twitter ,
            url_youtube : app.url_youtube ,
            user_youtube : app.user_youtube ,
            pw_youtube : app.pw_youtube ,
            url_facebook : app.url_facebook ,
            user_facebook : app.user_facebook ,
            pw_facebook : app.pw_facebook ,
            url_instagram : app.url_instagram ,
            user_instagram : app.user_instagram ,
            pw_instagram : app.pw_instagram
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
