<template>
    <div>
        <router-link to="/maquinas">Volver</router-link>
        <h2>Detalles del cliente</h2>
        <h3> {{ maquina.id }}</h3>
        <p> {{ maquina.nombre }}</p>
        <p> {{ maquina.tipo }}</p>
    </div>
</template>

<script>
import axios from 'axios';
    export default {
        name: 'Maquina',
        data: () => ({
            maquina: {}
        }),
        async mounted () {
            const maquinaId = this.$route.params.id;
            const response = await axios.get('/maquinas/show/'+maquinaId)
            this.maquina = response.data.maquina
        },
    }
</script>

<style>
</style>