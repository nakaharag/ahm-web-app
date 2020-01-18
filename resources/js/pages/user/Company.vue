<template>
    <div class="container">
        <router-link v-if="$auth.check(2)" :to="{ name: 'admin-dashboard'}">Voltar</router-link>
        <router-link v-else :to="{ name: 'dashboard'}">Voltar</router-link>
        <div class="card card-default p-1 mb-2 d-flex">
            <div class="card-header">Detalhes</div>
            <div class="card-body">
                <companyDetail></companyDetail>
            </div>
        </div>
        <div class="card card-default p-1">
            <div class="card-header">Formulários Disponíveis</div>
            <div class="card-body">
                <formList :company-id="this.$route.params.companyId"></formList>
            </div>
        </div>
        <div class="card card-default p-1">
            <div class="card-header">Formulários Preenchidos</div>
            <div class="card-body">
                <formCompletedList :company-id="this.$route.params.companyId"></formCompletedList>
            </div>
        </div>
    </div>
</template>
<script>
import companyDetail from '../../components/company-detail.vue'
import formList from '../../components/form-list.vue'
import formCompletedList from '../../components/form-completed-list.vue'
  export default {
    data() {
      return {
        //
      }
    },
    components: {
      companyDetail,
      formList,
      formCompletedList
    }
  }
</script>
<style scoped>
  a  { 
    border: 1px solid #73738c;
    padding: 5px;
    margin: 10px;
    background-color: #73738c;
    color: #FFF;
    border-radius: 5px;
    display: inline-block;
  }
  a:hover{
    background-color: #565658;
    text-decoration: none;
    color: #FFF;
  }
</style>