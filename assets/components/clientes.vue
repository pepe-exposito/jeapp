<template>
    <div>
        <div class="row">
            <router-link to="/cliente/create">Create New Client</router-link>
            <ul>
                <li v-for="cliente in clientes" :key="cliente.id">
                    Nombre: {{ cliente.nombre }} | Apellido: {{ cliente.apellido }} | DNI: {{ cliente.dni }}
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

    .row{
        display: block;
        justify-content: center;
        align-items: center;
    }

    ul{
    }

    li{
        border: 1px grey solid;
        list-style: none;
    }

</style>