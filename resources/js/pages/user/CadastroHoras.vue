<template>
    <div class="container">
      <div class="col-8 offset-2">
          <div class="card card-default">
              <div class="card-header">Cadastrar Serviços Prestados</div>
              <div class="col-12 p-3">
                  <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.whats }">
                      <label for="empresa">Selecione o cliente...</label>
                      <select class="form-control" name="empresa" id="empresa" v-model="empresa">
                          <option :key="company.id" v-bind:value="{id: company.id}" v-for="company in companies">
                          {{ company.empresa }}
                          </option>
                      </select>
                  </div>
              </div>
              <div class="row p-3" v-on:click="forceRerender">
                <div class="col-12">
                  <addServiceHours :empresaId="empresa.id" componentKey></addServiceHours>       
                </div>
              </div>
          </div>
      </div>
    </div>
</template>
<script>
import addServiceDescription from '../../components/add-service-description.vue'
import addServiceHours from '../../components/add-service-hours.vue'

export default {
    data() {
      return {
        has_error: false,
        companies: null,
        empresa: '',
        search: "",
        componentKey: 0
      }
    },
    components: {
      addServiceDescription,
      addServiceHours
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
    },
    methods: {
    forceRerender() {
      this.componentKey += 1
    }
  }
}
</script>