<template>
  <div id="app">
    <div class="container">
      <router-link v-if="$auth.check(2)" :to="{ name: 'admin-dashboard'}">Voltar</router-link>
      <router-link v-else :to="{ name: 'dashboard'}">Voltar</router-link>
      <!--<img src="./assets/logo.png">-->
      <!-- If you want to show survey, uncomment the line below -->
      <!-- If you want to hide Survey Creator, comment the line below -->
      <!-- <survey-creator></survey-creator>-->
      
      <div v-if="result">
        <surveyFormResult :survey-id="this.$route.params.survey_id" :result="result"></surveyFormResult>
      </div>
      
      <!--<surveyMonitoramento></surveyMonitoramento>-->



    </div>
  </div>
</template>

<script>
import surveyFormResult from '../../components/survey-form-result.vue'
export default {
    
  name: 'app',
  components: {
    surveyFormResult
  },
  data () {
    
    return {
      result: null
    }
  },
  mounted () {
    axios
      .get(`https://dxsurvey.com/api/MySurveys/getSurveyResults?accessKey=3cf61e0528554c948f6fb4d6864d4c69&id=${this.$route.params.survey_id}`)
      .then(response => {
         response.data.Data.forEach(el => {
          if(el.ClientId && el.ClientId == this.$route.params.result_id){
            this.result = el
          }
        });
      })
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