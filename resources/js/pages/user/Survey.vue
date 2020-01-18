<template>
  <div id="app">
    <div class="container">
      <router-link v-if="$auth.check(2)" :to="{ name: 'admin-dashboard'}">Voltar</router-link>
      <router-link v-else :to="{ name: 'dashboard'}">Voltar</router-link>
      <!--<img src="./assets/logo.png">-->
      <!-- If you want to show survey, uncomment the line below -->
      <!-- If you want to hide Survey Creator, comment the line below -->
      <!-- <survey-creator></survey-creator>-->
      <surveyForm :survey-id="this.$route.params.formId"></surveyForm>

      <!--<surveyMonitoramento></surveyMonitoramento>-->
    </div>
  </div>
</template>

<script>
import surveyForm from '../../components/survey-form.vue'

export default {
    
  name: 'app',
  components: {
      surveyForm
  },
  data () {
    return {
    }
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