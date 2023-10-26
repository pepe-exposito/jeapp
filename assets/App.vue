<template>
    <div class="main-container" style="display: block;">
        <h1> Hello {{ firstName }}! This is an API page </h1>

        <div class = "contenedor" style="display: block;">
            <router-link to="/clientes">Clientes</router-link>
            <router-link to="/maquinas">Máquinas</router-link>
            <router-link to="/videos">Videos</router-link>
            <router-link to="/recaudaciones">Recaudaciones</router-link>
            
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
    import Maquinas from './components/maquinas.vue'
    import Recaudaciones from './components/recaudaciones.vue'
    import Sidebar from './components/sidebar.vue'
    import Videos from './components/videos.vue'
    import Clientes from './components/clientes.vue'

    export default {
        name:'App',
        components: {
            Maquinas,
            Sidebar,
            Recaudaciones,
            Videos,
            Clientes
        },
        data(){
            return {
                firstName: 'cliente',
            }
        },

    }

</script>

<style scoped>
    .main-container{
        display: flex;
        margin-inline: auto;
        background-color: #c7e7af;
        text-align: center;
        width: 40%;
        justify-content: center;
    }
</style>