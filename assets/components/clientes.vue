<template>
    <div>
        <div class="row">
            <ul>
                <li v-for="cliente in clientes" :key="cliente.id">
                    {{ cliente.nombre }} - {{ cliente.apellido }}
                </li>
            </ul>
        </div>
        <div><h1>clientes</h1></div>
        <LegendComponent :title="legend"/>
    </div>
</template>

<script>
import axios from 'axios';
import LegendComponent from './legend.vue'

    export default {
        name: 'Clientes',
        components:{
            LegendComponent,
        },
        data: () => ({
            clientes: [],
            legend: 'TODO contenido reactivo'
        }),
        async mounted () {
            const response = await axios.get('/clientes');
            this.clientes = response.data.clientes 
        },
    }

</script>

<style>
</style>