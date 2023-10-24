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
            legend: 'Esto es la leyenda como tu'
        }),
    }

</script>

<style>
</style>