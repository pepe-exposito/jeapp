<template>
    <div>
        <router-link to="/clientes">Volver</router-link>
        <h2>Detalles del cliente</h2>
        <h3> {{ cliente.nombre }}</h3>
        <p> {{ cliente.apellido }}</p>
        <p> {{ cliente.dni }}</p>
        <p> {{ cliente.email }}</p>
    </div>
</template>

<script>
import axios from 'axios';
    export default {
        name: 'Cliente',
        data: () => ({
            cliente: {}
        }),
        async mounted () {
            const clienteId = this.$route.params.id;
            const response = await axios.get('/clientes/show/'+clienteId)
            this.cliente = response.data.cliente
        },
    }
</script>

<style>
</style>