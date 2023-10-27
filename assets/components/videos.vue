<template>
    <div>
        <div class="row">
            <router-link to="/videos/create">Crear video</router-link>

            <div class="table-container">
                <h1> Videos </h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th> Id </th>
                            <th> Nombre </th>
                            <th> Duración</th>
                            <th> Acciones </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr  v-for="video in videos" :key="video.id">
                            <th>
                                {{ video.id }}
                            </th>
                            <th>
                                {{ video.nombre }}
                            </th>
                            <th>
                                {{ video.duracion }}
                            </th>
                            <th>
                                <router-link :to="'/videos/show/' + video.id"> Mostrar </router-link>
                                <router-link :to="'/videos/update/' + video.id">Editar</router-link>
                                <router-link :to="'/videos/delete/' + video.id"> Borrar </router-link>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
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