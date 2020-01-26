<template>
    <div class="container">
        <div class="card card-default">
            <div class="card-header">Cadastrar Serviços Prestados</div>
            <div class="col-4 p-3 d-flex">
                <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.whats }">
                    <label for="empresa">Selecione o cliente...</label>
                    <select class="form-control" name="empresa" id="empresa" v-model="empresa">
                        <option :key="company.id" v-bind:value="{id: company.id}" v-for="company in companies">
                        {{ company.empresa }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="row">
              <div class="col-6" v-if="$auth.check(2)">
                <addServiceDescription :empresaId="empresa.id"></addServiceDescription>
              </div>
              <div class="col-6">
                <addServiceHours :empresaId="empresa.id"></addServiceHours>       
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
    }
}
</script>