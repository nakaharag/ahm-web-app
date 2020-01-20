<template>
    <div class="container">
        <div class="col-10 d-flex">
          <div v-if="survey">
            <survey :survey="survey"></survey> 
            <div id="surveyResult"></div>
          </div>
          <div v-else>
            Não foi possível carregar a pesquisa.
          </div>
        </div>
    </div>
</template>

<script>
import * as SurveyVue from 'survey-vue'
import 'bootstrap/dist/css/bootstrap.css';

var Survey = SurveyVue.Survey
Survey.cssType = "bootstrap";

export default {

  data () {   

    let result_id = Date.now();

    var json = {
      surveyId: this.$route.params.formId,
      surveyPostId: this.$route.params.PostId,
      clientId: result_id
    };

    var model = new SurveyVue.Model(json)

    let data = {
        survey_id: this.$route.params.formId,
        result_id: result_id,
        company_id: this.$route.params.companyId,
        survey_name: this.$route.params.formName
    }

    model
    .onComplete
    .add(function (result) {
      axios.post('surveys/', data
      ).catch(function (error) {
        console.log(error);
      });
    });

    return {
        survey: model,
        survey_id: null
    }
  }
}
</script>