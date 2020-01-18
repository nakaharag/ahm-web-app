<template>
    <div>
        <div v-if="infos">
        <table class="table">
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Data de cadastro</th>
            </tr>
                    <tr v-for="info in infos" v-bind:key="info.Id" style="margin-bottom: 5px;">
                        <router-link :to="{ name: 'survey', params: { formId: info.Id, companyId: companyId, surveyName: info.Name, PostId:info.PostId, formName:info.Name}}">
                            <th scope="row">{{ info.Name }}</th>
                            <td>{{ info.CreatedAt | moment }}</td>
                        </router-link>
                </tr>
        </table>
        </div>
        <div v-else>Carregando...</div>
    </div>
</template>
<script>
export default {
  props: {
    companyId: Number
  },
  data () {
    return {
      infos: null,
    }
  },
  mounted () {
    axios
      .get('https://dxsurvey.com/api/MySurveys/getActive?accessKey=3cf61e0528554c948f6fb4d6864d4c69')
      .then(response => {
          this.infos = response.data
      })
  }
}
</script>
<style scoped>
    a {
        display: contents;
    }
</style>