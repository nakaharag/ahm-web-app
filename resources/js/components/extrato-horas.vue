<template>
<div>
    <div id="list-companies" v-if="servicos && servicos.length && company">
      <p v-if="company" class="m-2 float-right">Horas contratadas: {{ company.horas }}</p>

      <ul>
        <li v-for="period in periods" v-bind:key="period.id">
          Periodo: {{ period.month }} / {{  period.year }}

          <table class="table">
            <tr>
              <th scope="col">Titulo</th>
              <th scope="col">Descrição</th>
              <th scope="col">Tempo</th>
              <th scope="col">Data</th>
            </tr>
            <tr v-for="servico in servicos" v-bind:key="servico.id" style="margin-bottom: 5px;">
              <div class="d-contents" v-if="period.month == servico.month && period.year == servico.year ">
                <th scope="row">{{ servico.titulo }}</th>
                <td>{{ servico.descricao }}</td>
                <td>{{ servico.horas }}<p v-if="servico.horas"> minutos</p></td>
                <td>{{ servico.data | moment }}</td>
              </div>
            </tr>
              <p class="pt-3 float-right">Saldo de horas: {{ totalHours(period.month, period.year) }}</p>
          </table>
        </li>
      </ul>
    </div>
    <div v-else>
      Não Foram encontrados serviços
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
        periods: null,
        month: null,
        year: null
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
         this.servicos = res.data.servicos,
         console.log(res)
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
      },
      totalHours(month, year){
        let sum = 0;
        for(let g = 0; g < this.servicos.length; g++){
          if (month == this.servicos[g].month && year == this.servicos[g].year){
            sum += this.servicos[g].horas;
          }
        }      
        let total = this.company.horas - (sum/60)
        return total.toFixed(2);
      }
    },
    computed: {
      totalHourss: function(month, year){
      let sum = 0;

        for(let g = 0; g < this.servicos.length; g++){
          if (month == this.servicos.month && year == this.servicos.year)
            sum += this.servicos[g].horas;
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
    .d-contents {
      display: contents;
    }
</style>