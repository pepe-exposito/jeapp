<template>
    <div>
        <h2>Editar máquina</h2>
        <router-link to="/maquinas">Volver</router-link>
        <form @submit.prevent="updateMaquina">
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" v-model="maquina.nombre" required />
            </div>
            <div>
                <label for="tipo">Tipo:</label>
                <input type="number" id="tipo" v-model="maquina.apellido" required />
            </div>
            <button type="submit">Aceptar</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';
export default {
     data: () =>  ({
        maquina: {
            nombre: '',
            tipo: 0
        }
    }),
    async mounted() {
        const maquinaId = this.$route.params.id;
        const response = await axios.get('/maquinas/show/'+maquinaId);
        this.maquina = response.data.maquina;
    },
    methods: {
        async updateMaquina() {
            const maquinaId = this.$route.params.id;
            const response = await axios.put('/maquinas/update/' + maquinaId, this.maquina).then(() => {
                this.$router.push('/maquinas'); 
            }).catch(error => {
                console.error('Error al modificar la máquina:', error.response.data);
            });
        },
    },
}
</script>

<style>
</style>