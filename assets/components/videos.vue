<template>
    <div>
        <div class="row">
            <router-link to="/videos/create">Crear video</router-link>
            <ul>
                <li v-for="video in videos" :key="video.id">
                   Id: {{ video.id }} <br> 
                   Nombre: {{ video.nombre }} <br> 
                   Duracion: {{ video.duracion }} <br> 
                   <router-link :to="'/videos/show/' + video.id"> Mostrar </router-link>
                <router-link :to="'/videos/delete/' + video.id"> Borrar </router-link>
                </li>
            </ul>
            <h1>videos</h1>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        name: 'Videos',
        data: () => ({
            videos: [],
        }),
        async mounted () {
            const response = await axios.get('/videos');
            this.videos = response.data.videosData
        },
    }

</script>

<style scoped>
</style>