<template>
<div>
    <div class="alert alert-danger" v-if="has_error">
        <p>Ocorreu um erro ao ler os detalhes de empresa</p>
    </div>
    <div v-if="company">
      <div class="row">
        <div class="col-3">
          <p><strong>Empresa:</strong></p>
          <p><strong>Responsável:</strong></p>
          <p><strong>Setor:</strong></p>
          <p><strong>E-mail:</strong></p>
          <p><strong>Whats:</strong></p>
        </div>
        <div class="col-3">
          <p>{{ company.empresa }}</p>
          <p>{{ company.responsavel }}</p>
          <p>{{ company.setor }}</p>
          <p>{{ company.email }}</p>
          <p>{{ company.whats }}</p>
        </div>
        <div class="col-3">
          <p><strong>Quantidade de clientes:</strong></p>
          <p><strong>Faturamento:</strong></p>
          <p><strong>Média de margem de lucro:</strong></p>
        </div>
        <div class="col-3">
          <p>{{ company.clientes }}</p>
          <p>{{ company.faturamento }}</p>
          <p>{{ company.margem }}</p>
        </div>
      </div>
    <!--  <table class="table">
          <tr>
              <th scope="col">Empresa</th>
              <th scope="col">Responsável</th>
              <th scope="col">Setor</th>
              <th scope="col">E-mail</th>
              <th scope="col">Whats</th>
              <th scope="col">Horas Contratadas</th>
              <th scope="col">Data de cadastro</th>
              <th scope="col" v-if="$auth.check(2)">Ações</th>
          </tr>
              <tr style="margin-bottom: 5px;">
                  <th scope="row">{{ company.empresa }}</th>
                  <td>{{ company.responsavel }}</td>
                  <td>{{ company.setor }}</td>
                  <td>{{ company.email }}</td>
                  <td>{{ company.whats }}</td>
                  <td>{{ company.horas }}</td>
                  <td>{{ company.created_at | moment }}</td>
                  <td @click.prevent="deleteCompany" v-if="$auth.check(2)"><a href="#"> Apagar</a></td>
              </tr>
      </table> -->
    </div>
    <div v-else>Carregando...</div>
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
      },
      deleteCompany(){
        axios
            .delete(`/companies/${this.$route.params.companyId}`)
            .then(response => {
                if(response.statusText == 'OK') {
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