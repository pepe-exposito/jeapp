<template>
    <div>
        <h2>Registrar nuevo video</h2>
        <router-link to="/videos">Volver</router-link>
        <form @submit.prevent="createVideo">
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" v-model="nuevoVideo.nombre" required />
            </div>
            <button type="submit">Aceptar</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            nuevoVideo: {
                nombre: '',
            },
        };
    },
    methods: {
        async createVideo() {
            try {
                const response = await axios.post('/videos/create', this.nuevoVideo);
                console.log('Video creado:', response.data);
                this.$router.push('/videos'); 
            } catch (error) {
                if (error.response) {
                    console.error('Error en la respuesta del servidor:', error.response.data);
                } else {
                    console.error('Error de red o solicitud:', error.message);
                }
            }
        },
    },
};
</script>

<style scoped>

    form{
        justify-content: left;
    }

</style>