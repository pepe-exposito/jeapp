<template>
    <div>
        <h2>Editar recaudacion</h2>
        <router-link to="/recaudaciones">Volver</router-link>
        <form @submit.prevent="updateRecaudacion">
            <div>
                <label for="cantidad">Cantidad:</label>
                <input type="number" id="cantidad" v-model="recaudacion.cantidad" required />
            </div>
            <button type="submit">Aceptar</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';
export default {
     data: () =>  ({
        recaudacion: {
            cantidad: 0,
            fecha: '',
        }
    }),
    async mounted() {
        const recaudacionId = this.$route.params.id;
        const response = await axios.get('/recaudaciones/show/'+recaudacionId);
        this.recaudacion = response.data.recaudacion;
    },
    methods: {
        async updateRecaudacion() {
            const recaudacionId = this.$route.params.id;
            const response = await axios.put('/recaudaciones/update/' + recaudacionId, this.recaudacion).then(() => {
                this.$router.push('/recaudaciones'); 
            }).catch(error => {
                console.error('Error al modificar la recaudacion:', error.response.data);
            });
        },
    },
}
</script>

<style>
</style>