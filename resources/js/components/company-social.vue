<template>
<div>
    <div class="alert alert-danger" v-if="has_error">
        <p>Ocorreu um erro ao ler os detalhes de empresa</p>
    </div>
    <div 
      v-if="
        company.user_facebook || 
        company.user_instagram || 
        company.user_twitter || 
        company.user_twitter || 
        company.user_linkedin || 
        company.user_youtube ||
        company.user_hospedagem"
      >
      <table class="table">
          <tr>
              <th scope="col">Rede Social</th>
              <th scope="col">Endereço</th>
              <th scope="col">Login</th>
              <th scope="col">Senha</th>
              <th scope="col">Seguidores</th>
          </tr>
              <tr style="margin-bottom: 5px;" v-if="company.user_facebook">
                  <td>Facebook</td>
                  <td>{{ company.url_facebook }}</td>
                  <td>{{ company.user_facebook }}</td>
                  <td>{{ company.pw_facebook }}</td>
                  <td>{{ company.fans_face }}</td>
              </tr>
              <tr style="margin-bottom: 5px;" v-if="company.user_instagram">
                  <td>Instagram</td>
                  <td>{{ company.url_instagram }}</td>
                  <td>{{ company.user_instagram }}</td>
                  <td>{{ company.pw_instagram }}</td>
                  <td>{{ company.seguidores_insta }}</td>
              </tr>
              <tr style="margin-bottom: 5px;" v-if="company.user_twitter">
                  <td>Twitter</td>
                  <td>{{ company.url_twitter }}</td>
                  <td>{{ company.user_twitter }}</td>
                  <td>{{ company.pw_twitter }}</td>
                  <td>{{ company.seguidores_twitter }}</td>
              </tr>
              <tr style="margin-bottom: 5px;" v-if="company.user_linkedin">
                  <td>Linkedin</td>
                  <td>{{ company.url_linkedin }}</td>
                  <td>{{ company.user_linkedin }}</td>
                  <td>{{ company.pw_linkedin }}</td>
                  <td>{{ company.contatos }}</td>
              </tr>
              <tr style="margin-bottom: 5px;" v-if="company.user_youtube">
                  <td>Youtube</td>
                  <td>{{ company.url_youtube }}</td>
                  <td>{{ company.user_youtube }}</td>
                  <td>{{ company.pw_youtube }}</td>
                  <td>{{ company.inscritos }}</td>
              </tr>
              <tr style="margin-bottom: 5px;" v-if="company.user_hospedagem">
                  <td>Hospedagem</td>
                  <td>{{ company.url_hospedagem }}</td>
                  <td>{{ company.user_hospedagem }}</td>
                  <td>{{ company.pw_hospedagem }}</td>
                  <td></td>
              </tr>
              <!--<tr style="margin-bottom: 5px;" v-if="company.obs">
                  <td>Observações</td>
                  <td>{{ company.obs }}</td>
              </tr>-->
      </table>
      <table class="table">
        <tr>
          <td>Observações: </td>
          <td>{{ company.obs }}</td>
        </tr>
      </table>
    </div>
    <div v-else>Não foram encontrados resultados</div>
</div>
</template>
<script>
  export default {
    data() {
      return {
        has_error: false,
        company: null
      }
    },
    mounted() {
      this.getCompany()
    },
    methods: {
      getCompany() {
        axios
            .get(`/companies/${this.$route.params.companyId}`)
            .then(response => {
                this.company = response.data.company
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