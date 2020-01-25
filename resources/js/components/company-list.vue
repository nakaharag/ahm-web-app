<template>
<div>
    <div class="alert alert-danger" v-if="has_error">
        <p>Ocorreu um erro ao ler a lista de empresas</p>
    </div>
    <div class="row">
        <div class="search-wrapper panel-heading col-sm-12 pb-2">
            <input class="form-control" type="text" v-model="search" placeholder="Procurar" />
        </div>                        
    </div>
    <div id="list-companies" v-if="companies && companies.length">
      <table class="table">
          <tr>
              <th scope="col">Empresa</th>
              <th scope="col">Responsável</th>
              <th scope="col">Setor</th>
              <th scope="col">E-mail</th>
              <th scope="col">Whats</th>
              <th scope="col">Horas Contratadas</th>
          </tr>
          <tr v-for="company in companiesFilter" v-bind:key="company.id" style="margin-bottom: 5px;">
              <router-link :to="{ name: 'company', params: { companyId: company.id }}">
                  <th scope="row">{{ company.empresa }}</th>
                  <td>{{ company.responsavel }}</td>
                  <td>{{ company.setor }}</td>
                  <td>{{ company.email }}</td>
                  <td>{{ company.whats }}</td>
                  <td>{{ company.horas }}</td>
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
        companies: null,
        search: "",
      }
    },
    computed: {
      companiesFilter: function() {
        var search = this.search;
        return this.companies.filter(function(el) {
          return el.empresa.toLowerCase().indexOf(search.toLowerCase()) !== -1;
        });
      }
    },
    mounted () {
      this.$http({
        url: `companies`,
        method: 'GET'
      })
          .then((res) => {
            this.companies = res.data.companies
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