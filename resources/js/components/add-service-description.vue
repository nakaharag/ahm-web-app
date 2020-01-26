<template>
   <div class="container">
      <div class="card card-default">
         <div class="container p-2">
            <form @submit.prevent="gravar" method="post">
               <div class="form-group">
                  <label for="titulo">Titulo</label>
                  <input type="text" class="form-control" id="titulo" name="titulo" v-model="titulo"/>
               </div>
               <div class="form-group">
                  <label for="descricao">Descrição</label>
                  <textarea class="form-control" id="descricao" name="descricao" v-model="descricao" rows="3"></textarea>
               </div>
               <div class="form-group">
                  <label for="date-picker">Data</label>
               </div>
               <template>
                  <date-picker v-model="data" :format="momentForamt"></date-picker>
               </template>
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
      descricao: null,
      titulo: null, 
      company_id: this.$attrs.empresaId,
      // Use moment.js instead of the default
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
  },
    methods: {
      gravar() {
        var app = this
        var date = moment(app.data).format("YYYY-MM-DD HH:mm:ss");
        var data = {
            data: date,
            descricao: app.descricao,
            titulo: app.titulo,
            company_id: this.$attrs.empresaId
          }
          console.log(data)
          axios.post('servico', data
      ).catch(function (error) {
        console.log(error);
      }).then(
        this.$router.go(-1)
      );
      }
    }
};
</script>