<template>
    <div>
        <div class="row">
            Load some maquinas
        </div>
        <LegendComponent :title="legend"/>
    </div>
</template>

<script>
import LegendComponent from './legend.vue'

    export default {
        name: 'Catalog',
        components:{
            LegendComponent,
        },
        data: () => ({
            legend: 'TODO contenido reactivo'
        }),
    }

</script>

<style>
</style>