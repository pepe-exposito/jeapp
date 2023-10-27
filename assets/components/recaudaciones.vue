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
                                {{ recaudacion.fecha }}
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
</style>