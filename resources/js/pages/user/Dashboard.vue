<template>
    <div class="container">
        <div class="card card-default">
            <div class="card-header">Lista de clientes</div>
            <div class="card-body">
                <clientList></clientList>
            </div>
        </div>
    </div>
</template>
<script>
  import clientList from '../../components/client-list.vue'
  export default {
    data() {
      return {
        //
      }
    },
    components: {
      clientList
    }
  }
</script>