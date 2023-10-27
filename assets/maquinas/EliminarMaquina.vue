<template>
    <div>
        <h2>Eliminar Máquina</h2>
        <button @click="eliminarMaquina">Confirmar eliminación</button>
    </div>
</template>

<script>
import axios from 'axios';
    export default {
        name: 'EliminarMaquina',
        methods: {
            async eliminarMaquina() {
                const maquinaId = this.$route.params.id;
                const response = await axios.delete('/maquinas/delete/'+maquinaId).then(() => {
                    this.$router.push('/maquinas'); 
                }).catch(error => {
                    console.error('Error al eliminar la maquina:', error);
                });
            },
        },
    }
</script>

<style>
</style>