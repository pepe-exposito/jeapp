<template>
    <div>
        <h2>Registrar nueva maquina</h2>
        <router-link to="/maquinas">Volver</router-link>
        <form @submit.prevent="createMaquina">
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" v-model="nuevaMaquina.nombre" required />
            </div>
            <div>
                <label for="tipo">Tipo:</label>
                <input type="number" id="tipo" v-model="nuevaMaquina.tipo" required />
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
            nuevaMaquina: {
                nombre: '',
                tipo: 0,
            },
        };
    },
    methods: {
        async createMaquina() {
            try {
                const response = await axios.post('/maquinas/create', this.nuevaMaquina);
                console.log('Maquina creada:', response.data);
                this.$router.push('/maquinas'); 
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