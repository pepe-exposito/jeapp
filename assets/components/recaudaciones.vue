<template>
    <div>
        <div class="row">
            <router-link to="/recaudaciones/create">Crear recaudación</router-link>
            <ul>
                <li v-for="recaudacion in recaudaciones" :key="recaudacion.id">
                   Id: {{ recaudacion.id }} <br> 
                   Fecha: {{ recaudacion.fecha }} <br> 
                   Cantidad: {{ recaudacion.cantidad }} <br> 
                   <router-link :to="'/recaudaciones/show/' + recaudacion.id"> Mostrar </router-link>
                   <router-link :to="'/recaudaciones/delete/' + recaudacion.id"> Borrar </router-link>
                </li>
                <h1>recaudaciones</h1>
            </ul>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        name: 'Recaudaciones',
        data: () => ({
            recaudaciones: [],
        }),
        async mounted () {
            const response = await axios.get('/recaudaciones');
            this.recaudaciones = response.data.recaudacionesData
        },
    }

</script>

<style>
</style>