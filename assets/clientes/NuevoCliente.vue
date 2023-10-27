<template>
    <div>
        <h2>Registrar nuevo cliente</h2>
        <router-link to="/clientes">Volver</router-link>
        <form @submit.prevent="createClient">
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" v-model="nuevoCliente.nombre" required />
            </div>
            <div>
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" v-model="nuevoCliente.apellido" required />
            </div>
            <div>
                <label for="dni">DNI:</label>
                <input type="text" id="dni" v-model="nuevoCliente.dni" required />
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="text" id="email" v-model="nuevoCliente.email" required />
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="text" id="password" v-model="nuevoCliente.password" required />
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
            nuevoCliente: {
                nombre: '',
                apellido: '',
                dni: '',
                email: '',
                password: ''
            },
        };
    },
    methods: {
        async createClient() {
            try {
                const response = await axios.post('/clientes/create', this.nuevoCliente);
                console.log('Cliente creado:', response.data);
                this.$router.push('/clientes'); 
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