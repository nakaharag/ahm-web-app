<template>
    <div>
    <div v-if="has_error">
      Não foram encontrados formulários
    </div>
    <div v-else>
      <div v-if="forms">
          <table class="table">
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">Data Respondido</th>
                <th scope="col">Ações</th>
              </tr>
              <tr v-for="form in forms" v-bind:key="form.id" style="margin-bottom: 5px;">
                  <th scope="row">{{ form.survey_name }}</th>
                  <td>{{ form.created_at | moment }}</td>
                  <td><router-link :to="{ name: 'survey-result', params: { survey_id: form.survey_id, result_id: form.result_id, survey_name: form.survey_name }}">Ver resultado</router-link> || <a href="" @click.prevent="deleteForm(form.id)">Apagar</a></td>
              </tr>
          </table>
        </div>
        <div v-else>Carregando...</div>
      </div>
    </div>
</template>
<script>
  export default {
    data() {
      return {
        has_error: true,
        forms: null
      }
    },
    mounted() {
        axios
        .get(`surveys/list?id=${this.$route.params.companyId}`)
        .then(response => {
          console.log(response)
          this.forms = response.data
          console.log(this.forms)
          this.forms.length==0?this.has_error = true:this.has_error = false
        })
        .catch(err => {
            this.has_error = true
        });

    },
    methods: {

      deleteForm(id){
        if(confirm('Deseja mesmo apagar este preenchimento?')){
          axios
            .delete(`/surveys/`+id)
            .then(response => {
                if(response.statusText == 'OK') {
                  this.$router.go(-1)
                }
            });
        }
      }
    }

  }
</script>
<style scoped>
    a {
        display: contents;
        cursor: pointer;
        color: #0056b3;
    }

    a:hover {
        color: #0056b3;
        text-decoration: underline;
    }
</style>