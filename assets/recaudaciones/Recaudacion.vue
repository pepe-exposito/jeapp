<template>
    <div>
        <router-link to="/recaudaciones">Volver</router-link>
        <h2>Detalles de la recaudacion</h2>
        <h3> {{ recaudacion.fecha }}</h3>
        <p> {{ recaudacion.cantidad }}</p>
    </div>
</template>

<script>
import axios from 'axios';
    export default {
        name: 'Recaudacion',
        data: () => ({
            recaudacion: {}
        }),
        async mounted () {
            const recaudacionId = this.$route.params.id;
            const response = await axios.get('/recaudaciones/show/'+recaudacionId)
            this.recaudacion = response.data.recaudacion
        },
    }
</script>

<style>
</style>