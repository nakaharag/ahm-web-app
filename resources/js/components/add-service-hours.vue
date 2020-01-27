<template>
   <div class="container" :v-if="this.$attrs.empresaId">
      <div class="card card-default">
         <div class="container p-2">
            <form @submit.prevent="gravar" method="post">
               <div class="form-group">
                  <label for="servico" class="control-label">Selecione o serviço executado</label>
                  <select class="form-control" name="servico" id="servico" v-model="servico">
                        <option :key="servico.id" :value="servico.id" v-for="servico in servicos">
                        {{ servico.titulo }}
                        </option>
                    </select>
               </div>
               <div class="row">
                  <div class="col-6">
                     <div class="form-group">
                        <label for="tempo" class="control-label">Quantidade de minutos</label>
                        <vue-numeric-input  v-model="tempo" :min="1" :max="9999" :step="1"></vue-numeric-input>
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="form-group">
                        <label for="date-picker" class="control-label d-block">Data</label>
                        <template>
                           <date-picker v-model="data" :format="momentForamt"></date-picker>
                        </template>
                     </div>
                  </div>
               </div>
               <button type="submit" class="btn btn-light float-right">Gravar</button>
            </form>
         </div>
      </div>
   </div>
</template>
<script>
import "vue2-datepicker/index.css";
import "vue2-datepicker/locale/pt-br";

export default {
  data() {
    return {
        data: null,
        tempo: null,
        servicos: '',
        servico: null,
        momentForamt: {
         // Date to String
         stringify: date => {
            return date ? moment(date).format("DD/MM/YYYY") : "";
         },
         // String to Date
         parse: value => {
            return value ? moment(value, "DD").toDate() : null;
         }
      }
    };
    components: {
        VueNumericInput
    }
  },
    methods: {
      gravar() {
        var app = this
        var date = moment(app.data).format("YYYY-MM-DD HH:mm:ss");
        var data = {
            tempo: app.tempo,
            data: date,
            id_servico_lista: app.servico,
            company_id: this.$attrs.empresaId
          }
          axios.post('servico', data
      ).catch(function (error) {
        console.log(error);
      }).then(
        //this.$router.go(-1)
        alert('Cadastro realizado com sucesso'),
        app.tempo = 0,
        app.date = null,
        app.servico = ''
      );
      }
    },

    watch: {
       $attrs: {
      handler() {
        axios.get(`servico/list/`
      ).catch(function (error) {
      console.log(error);
      })
         .then((res) => {
         this.servicos = res.data
         }, () => {
         this.has_error = true
         })
      },
      deep: true,
      immediate: true,
    },
    }
};
</script>