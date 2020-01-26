<template>
    <div class="container">
        <button 
          id="saveToPDFbtn" 
          class="float-right btn btn-primary" 
          style="margin:10px" 
          @click="saveSurveyToPdf"
        >
          Download PDF
        </button>
        <div class="col-10 d-flex">
          
            <div v-if="survey">
              <div v-if="loading">
              Carregando os dados da pesquisa...
              </div>
              <div v-else>
                
                <div id="surveyResult">
                  <survey :survey="survey"></survey> 
                </div>
                <div id="pdf-preview"></div>
              </div>
          </div>
          <div v-else>
            Não foi possível carregar a pesquisa.
          </div>
        </div>
    </div>
</template>

<script>
import * as SurveyVue from 'survey-vue'
import * as SurveyPDF from 'survey-pdf'
//import * as jsPDF from 'jspdf'
import 'bootstrap/dist/css/bootstrap.css';

var Survey = SurveyVue.Survey
//var SurveyPDF = SurveyPDF.Survey
Survey.cssType = "bootstrap";

export default {

  data () {   
    var json = {
      surveyId: this.$route.params.survey_id
    };

    var model = new SurveyVue.Model(json)
    
    model.data = this.$attrs.result;
    model.mode = 'display';
  
    // Survey
    // .onComplete(function (result) {
    //   loading = false;
    // });

   // document
   // .getElementById("saveToPDFbtn")
   // .onclick = function () {
      //  var pdfWidth = model.pdfWidth || 210;
      //  var pdfHeight = model.pdfHeight || 297;
      //  saveSurveyToPdf("surveyResult.pdf", model, pdfWidth, pdfHeight);
   // }

    return {
        survey: model,
        survey_id: null,
        json: json,
        loading: false
    }
  },
  methods: {
    saveSurveyToPdf() {
      var pdfWidth = this.survey.pdfWidth || 210;
      var pdfHeight = this.survey.pdfHeight || 297;

      var options = {
          fontSize: 14,
          margins: {
              left: 10,
              right: 10,
              top: 10,
              bot: 10
          },
          format: [pdfWidth, pdfHeight]
      };
      var surveyModel = this.survey;

      var json = JSON.stringify(this.survey);

      var surveyPDF = new SurveyPDF.SurveyPDF(json, options);
      surveyPDF.data = surveyModel.data;
      
      surveyPDF.save('filename');
    }
  }
}
</script>