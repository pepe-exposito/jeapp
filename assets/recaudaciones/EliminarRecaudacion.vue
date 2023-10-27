<template>
    <div>
        <h2>Eliminar recaudacion</h2>
        <button @click="eliminarRecaudacion">Confirmar eliminación</button>
    </div>
</template>

<script>
import axios from 'axios';
    export default {
        name: 'EliminarRecaudacion',
        methods: {
            async eliminarRecaudacion() {
                const recaudacionId = this.$route.params.id;
                const response = await axios.delete('/recaudaciones/delete/'+recaudacionId).then(() => {
                    this.$router.push('/recaudaciones'); 
                }).catch(error => {
                    console.error('Error al eliminar el cliente:', error);
                });
            },
        },
    }
</script>

<style>
</style>