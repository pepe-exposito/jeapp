<template>
    <div>
        <h2>Eliminar video</h2>
        <button @click="eliminarVideo">Confirmar eliminación</button>
    </div>
</template>

<script>
import axios from 'axios';
    export default {
        name: 'EliminarVideo',
        methods: {
            async eliminarVideo() {
                const videoId = this.$route.params.id;
                const response = await axios.delete('/videos/delete/'+videoId).then(() => {
                    this.$router.push('/videos'); 
                }).catch(error => {
                    console.error('Error al eliminar el video:', error);
                });
            },
        },
    }
</script>

<style>
</style>