<template>
    <div class="container">
      <router-link v-if="$auth.check(2)" :to="{ name: 'admin-dashboard'}">Voltar</router-link>
      <router-link v-else :to="{ name: 'dashboard'}">Voltar</router-link>
      <div class="card card-default">
          <div class="card-header">Detalhes</div>
          <div class="card-body">
              <userDetail></userDetail>
          </div>
      </div>
    </div>
</template>
<script>
import userDetail from '../../components/user-detail.vue'
  export default {
    data() {
      return {
        //
      }
    },
    components: {
      userDetail
    }
  }
</script>
<style scoped>
  a { 
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