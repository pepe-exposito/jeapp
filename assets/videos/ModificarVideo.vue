<template>
    <div>
        <h2>Editar video</h2>
        <router-link to="/videos">Volver</router-link>
        <form @submit.prevent="updateVideo">
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" v-model="video.nombre" required />
            </div>
            <button type="submit">Aceptar</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';
export default {
     data: () =>  ({
        video: {
            nombre: '',
        }
    }),
    async mounted() {
        const videoId = this.$route.params.id;
        const response = await axios.get('/videos/show/'+videoId);
        this.video = response.data.video;
    },
    methods: {
        async updateVideo() {
            const videoId = this.$route.params.id;
            const response = await axios.put('/videos/update/' + videoId, this.video).then(() => {
                this.$router.push('/videos'); 
            }).catch(error => {
                console.error('Error al modificar el video:', error);
            });
        },
    },
}
</script>

<style>
</style>