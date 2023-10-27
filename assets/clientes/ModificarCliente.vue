<template>
    <div>
        <h2>Editar cliente</h2>
        <router-link to="/clientes">Volver</router-link>
        <form @submit.prevent="updateClient">
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" v-model="cliente.nombre" required />
            </div>
            <div>
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" v-model="cliente.apellido" required />
            </div>
            <div>
                <label for="dni">DNI:</label>
                <input type="text" id="dni" v-model="cliente.dni" required />
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="text" id="email" v-model="cliente.email" required />
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="text" id="password" v-model="cliente.password" required />
            </div>
            <button type="submit">Aceptar</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';
export default {
     data: () =>  ({
        cliente: {
            nombre: '',
            apellido: '',
            dni: '',
            email: '',
            password: ''
        }
    }),
    async mounted() {
        const clienteId = this.$route.params.id;
        const response = await axios.get('/clientes/show/'+clienteId);
        this.cliente = response.data.cliente;
    },
    methods: {
        async updateClient() {
            const clienteId = this.$route.params.id;
            const response = await axios.put('/clientes/update/' + clienteId, this.cliente).then(() => {
                this.$router.push('/clientes'); 
            }).catch(error => {
                console.error('Error al modificar el cliente:', error);
            });
        },
    },
}
</script>

<style>
</style>