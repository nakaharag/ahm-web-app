<template>
    <div class="container">
        <div class="card card-default">
            <div class="card-header">Área do cliente</div>
            <div class="card-body" v-if="client">
                <p>Bem vindo, {{ client.nome }}</p>
                <p>Confira abaixo seu extrato de horas</p>
                <extratoHoras :companyId="this.client.id_company"></extratoHoras>
            </div>
        </div>
    </div>
</template>
<script>
  import extratoHoras from '../../components/extrato-horas.vue'
  export default {
    data() {
      return {
        client: null
      }
    },
    components: {
      extratoHoras
    },
    mounted() {
        axios
            .get(`/users/find/${this.$auth.user().email}`)
            .then(response => {
                this.client = response.data.user
            });
      }
  }
</script>