<template>
<div>
    <div id="list-companies" v-if="servicos && servicos.length">
      <table class="table">
          <tr>
              <th scope="col">Titulo</th>
              <th scope="col">Descrição</th>
              <th scope="col">Horas</th>
              <th scope="col">Data</th>
          </tr>
          <tr v-for="servico in servicos" v-bind:key="servico.id" style="margin-bottom: 5px;">
                  <th scope="row">{{ servico.titulo }}</th>
                  <td>{{ servico.descricao }}</td>
                  <td>{{ servico.horas }}</td>
                  <td>{{ servico.created_at | moment }}</td>
          </tr>
      </table>
    </div>
</div>
</template>
<script>
  export default {
    data() {
      return {
        has_error: false,
        servicos: null
      }
    },
    mounted() {
      this.getCompany()
    },
    methods: {
      getCompany() {
        axios.get(`servico/${this.$attrs.companyId}`
      ).catch(function (error) {
      console.log(error);
      })
         .then((res) => {
         this.servicos = res.data
         }, () => {
         this.has_error = true
         })
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