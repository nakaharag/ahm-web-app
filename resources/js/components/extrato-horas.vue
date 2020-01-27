<template>
<div>
    <div id="list-companies" v-if="servicos && servicos.length && company">
      <p v-if="company" class="m-2 float-right">Horas contratadas: {{ company.horas }}</p>
      <ul>
      <li v-for="period in periods" v-bind:key="period.contagem + 1">{{ period.contagem }}</li>
      </ul>
      <table class="table">
          <tr>
              <th scope="col">Titulo</th>
              <th scope="col">Descrição</th>
              <th scope="col">Tempo</th>
              <th scope="col">Data</th>
          </tr>
          <tr v-for="period in periods" v-bind:key="period.contagem +1" style="margin-bottom: 5px;">
            Periodo: {{ period.month }} / {{  period.year }}
          </tr>
          <tr v-for="servico in servicos" v-bind:key="servico.id" style="margin-bottom: 5px;">
            <th scope="row">{{ servico.titulo }}</th>
            <td>{{ servico.descricao }}</td>
            <td>{{ servico.horas }}<p v-if="servico.horas"> minutos</p></td>
            <td>{{ servico.data | moment }}</td>
          </tr>
          <p class="pt-3 float-right">Saldo de horas: {{ totalHours }}</p>
      </table>
    </div>
    <div v-else>
      Carregando informações...
    </div>
</div>
</template>
<script>
  export default {
    data() {
      return {
        has_error: false,
        servicos: null,
        company: null,
        periods: null
      }
    },
    mounted() {
      this.getCompany(),
      this.getServico(),
      this.getPeriods()
    },
    methods: {
      getServico() {
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
      getCompany() {
        axios
          .get(`/companies/${this.$attrs.companyId}`)
          .then(response => {
              this.company = response.data.company
          });
      },
      getPeriods() {
        axios
          .get(`/servico/periods/${this.$attrs.companyId}`)
          .then(response => {
              this.periods = response.data
          });
      }
    },
    computed: {
      totalHours: function(){
      let sum = 0;
      for(let i = 0; i < this.servicos.length; i++){
        sum += this.servicos[i].horas;
      }
      let total = this.company.horas - (sum/60).toFixed(2);
     return total;
   }
}
  }
</script>
<style scoped>
    a {
        display: contents;
    }
    p {
      display: inline;
    }
</style>