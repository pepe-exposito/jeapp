<template>
    <div>
        <h2>Eliminar cliente</h2>
        <button @click="eliminarCliente">Confirmar eliminación</button>
    </div>
</template>

<script>
import axios from 'axios';
    export default {
        name: 'EliminarCliente',
        methods: {
            async eliminarCliente() {
                const clienteId = this.$route.params.id;
                const response = await axios.delete('/clientes/delete/'+clienteId).then(() => {
                    this.$router.push('/clientes'); 
                }).catch(error => {
                    console.error('Error al eliminar el cliente:', error);
                });
                console.log(clienteId)
            },
        },
    }
</script>

<style>
</style>