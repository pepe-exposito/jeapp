<template>
    <div>
        <div class="row">
            <router-link to="/clientes/create">Crear cliente</router-link>
            <ul>
                <li v-for="cliente in clientes" :key="cliente.id">
                    Nombre: {{ cliente.nombre }} | Apellido: {{ cliente.apellido }} | DNI: {{ cliente.dni }}
                    <router-link :to="'/clientes/show/' + cliente.id"> Mostrar </router-link>
                    <router-link :to="'/clientes/delete/' + cliente.id"> Borrar </router-link>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        name: 'Clientes',
        data: () => ({
            clientes: [],
        }),
        async mounted () {
            const response = await axios.get('/clientes');
            this.clientes = response.data.clientes 
        },
    }

</script>

<style>

    .row{
        display: block;
        justify-content: center;
        align-items: center;
    }

    ul{
    }

    li{
        border: 1px grey solid;
        list-style: none;
    }

</style>