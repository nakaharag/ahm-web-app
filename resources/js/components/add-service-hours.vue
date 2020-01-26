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
               <div class="form-group">
                  <label for="horas" class="control-label m-4">Quantidade de horas</label>
                  <vue-numeric-input  v-model="horas" :min="1" :max="520" :step="1"></vue-numeric-input>
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
        horas: null,
        servicos: '',
        servico: null
    };
    components: {
        VueNumericInput
    }
  },
    methods: {
      gravar() {
        var app = this
        var data = {
            horas: app.horas,
            servico: app.servico,
            servico_id: app.servico,
            company_id: this.$attrs.empresaId
          }
          axios.put('servico', data
      ).catch(function (error) {
        console.log(error);
      }).then(
        //this.$router.go(-1)
        alert('Cadastro realizado com sucesso')
      );
      }
    },

    watch: {
       $attrs: {
      handler() {
        //this.parseData();
        console.log(this.$attrs)
        axios.get(`servico/${this.$attrs.empresaId}`
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