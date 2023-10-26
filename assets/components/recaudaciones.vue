<template>
    <div>
        <div class="row">
            <ul>
                <li v-for="recaudacion in recaudaciones" :key="recaudacion.id">
                   Id: {{ recaudacion.id }} <br> 
                   Fecha: {{ recaudacion.fecha }} <br> 
                   Cantidad: {{ recaudacion.cantidad }} <br> 
                </li>
                <h1>recaudaciones</h1>
            </ul>
        </div>
        <LegendComponent :title="legend"/>
    </div>
</template>

<script>
import axios from 'axios';
import LegendComponent from './legend.vue'

    export default {
        name: 'Recaudaciones',
        components:{
            LegendComponent,
        },
        data: () => ({
            recaudaciones: [],
            legend: 'TODO contenido reactivo'
        }),
        async mounted () {
            const response = await axios.get('/recaudaciones');
            this.recaudaciones = response.data.recaudacionesData

            console.log(response)
        },
    }

</script>

<style>
</style>