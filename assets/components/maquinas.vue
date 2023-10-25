<template>
    <div>
        <div class="row">
            <ul>
                <li v-for="maquina in maquinas" :key="maquina.id">
                    {{ maquina.id }} - {{ maquina.nombre }} - {{ maquina.tipo }}
                </li>
        </ul>
        </div>
        <LegendComponent :title="legend"/>
    </div>
</template>

<script>
import axios from 'axios';
import LegendComponent from './legend.vue'

    export default {
        name: 'Maquinas',
        components:{
            LegendComponent,
        },
        data: () => ({
            maquinas: [],
            legend: 'TODO contenido reactivo'
        }),
        async mounted () {
            const response = await axios.get('/maquinas');
            this.maquinas = response.data.maquinasData
        },
    }

</script>

<style>
</style>