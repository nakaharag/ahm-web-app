<template>
    <div class="container">
        <div class="card card-default">
            <div class="card-header">Lista de empresas</div>
            <div class="card-body">
                <companyList></companyList>
            </div>
        </div>
    </div>
</template>
<script>
  import companyList from '../../components/company-list.vue'
  export default {
    data() {
      return {
        //
      }
    },
    components: {
      companyList
    }
  }
</script>