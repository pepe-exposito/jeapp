<template>
    <div>
        <div class="row">
            <router-link to="/maquinas/create">Crear máquina</router-link>

            <div class="table-container">
                <h1> Máquinas </h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th> Id </th>
                            <th> Nombre </th>
                            <th> Tipo </th>
                            <th> Acciones </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr  v-for="maquina in maquinas" :key="maquina.id">
                            <th>
                                {{ maquina.id }}
                            </th>
                            <th>
                                {{ maquina.nombre }}
                            </th>
                            <th>
                                {{ maquina.tipo }}
                            </th>
                            <th>
                                <router-link :to="'/maquinas/show/' + maquina.id"> Mostrar </router-link>
                                <router-link :to="'/maquinas/update/' + maquina.id"> Editar </router-link>                            
                                <router-link :to="'/maquinas/delete/' + maquina.id"> Borrar </router-link>
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
        name: 'Maquinas',
        data: () => ({
            maquinas: [],
        }),
        async mounted () {
            const response = await axios.get('/maquinas');
            this.maquinas = response.data.maquinasData
        },
    }

</script>

<style>
</style>