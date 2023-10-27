<template>
    <div>
        <router-link to="/videos">Volver</router-link>
        <h2>Detalles del video</h2>
        <h3> {{ video.nombre }}</h3>
        <p> {{ video.duracion }}</p>
    </div>
</template>

<script>
import axios from 'axios';
    export default {
        name: 'Video',
        data: () => ({
            video: {}
        }),
        async mounted () {
            const videoId = this.$route.params.id;
            const response = await axios.get('/videos/show/'+videoId)
            this.video = response.data.video
        },
    }
</script>

<style>
</style>