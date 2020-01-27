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
               <button type="submit" class="btn btn-light">Gravar</button>
            </form>
         </div>
      </div>
   </div>
</template>
<script>
export default {
  data() {
    return {
      descricao: null,
      titulo: null
    }
  },
    methods: {
      gravar() {
        var app = this
        var data = {
            descricao: app.descricao,
            titulo: app.titulo
          }
          axios.post('servico/list/', data
            ).catch(function (error) {
              console.log(error);
            }).then(
              alert("Serviço cadastrado com sucesso!"),
              this.clean()
              //this.$router.go(0)
            );
      },
      clean(){
        this.descricao=''
        this.titulo =''
      }
    }
};
</script>