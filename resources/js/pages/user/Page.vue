<template>
    <div class="container">
        <div class="card card-default">
            <div class="card-header">Detalhes</div>
            <div class="card-body">
                <userDetail></userDetail>
            </div>
        </div>
    </div>
</template>
<script>
import userDetail from '../../components/user-detail.vue'
  export default {
    data() {
      return {
        //
      }
    },
    components: {
      userDetail
    }
  }
</script>