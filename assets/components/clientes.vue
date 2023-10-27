<template>
    <div>
        <div class="row">
            <router-link to="/clientes/create">Crear cliente</router-link>

            <div class="table-container">
                <h1> Clientes </h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th> Id </th>
                            <th> Nombre </th>
                            <th> Apellido </th>
                            <th> Dni </th>
                            <th> Email </th>
                            <th> Acciones </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr  v-for="cliente in clientes" :key="cliente.id">
                            <th>
                                {{ cliente.id }}
                            </th>
                            <th>
                                {{ cliente.nombre }}
                            </th>
                            <th>
                                {{ cliente.apellido }}
                            </th>
                            <th>
                                {{ cliente.dni }}
                            </th>
                            <th>
                                {{ cliente.email }}
                            </th>
                            <th>
                                <router-link :to="'/clientes/show/' + cliente.id"> Mostrar </router-link>
                                <router-link :to="'/clientes/update/' + cliente.id"> Editar </router-link>
                                <router-link :to="'/clientes/delete/' + cliente.id"> Borrar </router-link>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
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

    li{
        border: 1px grey solid;
        list-style: none;
    }

</style>