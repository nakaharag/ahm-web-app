<template>
    <div class="container">
        <div class="col-8 offset-2">
            <div class="card card-default">
                <div class="card-header p-3">Cadastrar Serviços Prestados</div>
                <addServiceDescriptionList class="p-3"></addServiceDescriptionList>
            </div>
        </div>
    </div>
</template>
<script>
import addServiceDescriptionList from '../../components/add-service-description-list.vue'
export default {
    data() {
        return {
            
        }
    },
    components: {
      addServiceDescriptionList
    }
}
</script>