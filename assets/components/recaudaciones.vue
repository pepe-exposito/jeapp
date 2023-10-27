<template>
    <div>
        <div class="row">
            <router-link to="/recaudaciones/create">Crear recaudación</router-link>
            <div class="table-container">
                <h1> Recaudaciones </h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th> Id </th>
                            <th> Fecha </th>
                            <th> Cantidad</th>
                            <th> Acciones </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr  v-for="recaudacion in recaudaciones" :key="recaudacion.id">
                            <th>
                                {{ recaudacion.id }}
                            </th>
                            <th>
                                {{ new Date (recaudacion.fecha.date).toLocaleString('es-Es', 
                                {year: "numeric", month: "2-digit", day: "2-digit",}) }}
                            </th>
                            <th>
                                {{ recaudacion.cantidad }}
                            </th>
                            <th>
                                <router-link :to="'/recaudaciones/show/' + recaudacion.id"> Mostrar </router-link>
                                <router-link :to="'/recaudaciones/update/' + recaudacion.id"> Editar </router-link>                     
                                <router-link :to="'/recaudaciones/delete/' + recaudacion.id"> Borrar </router-link>
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
        name: 'Recaudaciones',
        data: () => ({
            recaudaciones: [],
        }),
        async mounted () {
            const response = await axios.get('/recaudaciones');
            this.recaudaciones = response.data.recaudacionesData
        }
    }

</script>

<style>
    .row {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .table-container {
        width: 80%;
        margin: 20px;
        justify-content: center;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        font-family: Arial, sans-serif;
    }

    table th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    table th, table td {
        padding: 10px;
        text-align: left;
    }

    table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    table tr:hover {
        background-color: #d9d9d9;
    }

    table a {
        text-decoration: none;
        margin: 0 5px;
        color: #007BFF;
    }

    .router-link-exact-active {
        font-weight: bold;
        color: #0056b3;
    }
</style>