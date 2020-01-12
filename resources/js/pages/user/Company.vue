<template>
    <div class="container">
        <div class="card card-default p-1 mb-2 d-flex">
            <div class="card-header">Detalhes</div>
            <div class="card-body">
                <companyDetail></companyDetail>
            </div>
        </div>
        <div class="card card-default p-1">
            <div class="card-header">Formulários</div>
            <div class="card-body">
                <formList></formList>
            </div>
        </div>
    </div>
</template>
<script>
import companyDetail from '../../components/company-detail.vue'
import formList from '../../components/form-list.vue'
  export default {
    data() {
      return {
        //
      }
    },
    components: {
      companyDetail,
      formList
    }
  }
</script>