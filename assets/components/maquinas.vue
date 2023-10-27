<template>
    <div>
        <div class="row">
            <router-link to="/maquinas/create">Crear máquina</router-link>
            <ul>
                <li v-for="maquina in maquinas" :key="maquina.id">
                    {{ maquina.id }} - {{ maquina.nombre }} - {{ maquina.tipo }}
                    <router-link :to="'/maquinas/show/' + maquina.id"> Mostrar </router-link>
                    <router-link :to="'/maquinas/delete/' + maquina.id"> Borrar </router-link>
                </li>
            </ul>
            <h1>Maquinas</h1>
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