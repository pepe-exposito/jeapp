<template>
    <div>
        <h2>Registrar nueva recaudacion</h2>
        <router-link to="/recaudaciones">Volver</router-link>
        <form @submit.prevent="createRecaudacion">
            <div>
                <label for="cantidad">Cantidad:</label>
                <input type="number" id="cantidad" v-model="nuevaRecaudacion.cantidad" required />
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
            nuevaRecaudacion: {
                cantidad: 0,
            },
        };
    },
    methods: {
        async createRecaudacion() {
            try {
                const response = await axios.post('/recaudaciones/create', this.nuevaRecaudacion);
                console.log('Recaudacion creada:', response.data);
                this.$router.push('/recaudaciones'); 
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