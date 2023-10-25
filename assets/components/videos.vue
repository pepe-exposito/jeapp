<template>
    <div>
        <div class="row">
            <ul>
                <li v-for="video in videos" :key="video.id">
                   Id: {{ video.id }} <br> 
                   Nombre: {{ video.nombre }} <br> 
                   Duracion: {{ video.duracion }} <br> 
                </li>
        </ul>
        </div>
        <LegendComponent :title="legend"/>
    </div>
</template>

<script>
import axios from 'axios';
import LegendComponent from './legend.vue'

    export default {
        name: 'Videos',
        components:{
            LegendComponent,
        },
        data: () => ({
            videos: [],
            legend: 'TODO contenido reactivo'
        }),
        async mounted () {
            const response = await axios.get('/videos');
            this.videos = response.data.videosData

            console.log(response)
        },
    }

</script>

<style>
    li{
        background-color: red;
    }
</style>