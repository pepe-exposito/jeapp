<template>
    <div class="main-container" style="display: block;">
        <h1> Hello {{ firstName }}! This is an API page </h1>
        <div style="display: inline-flex;">
            <div> <Sidebar @navigate="changeComponent"/> </div>
            <div>
                <Clientes v-if="currentComponent === 'clientes'"/>
                <Maquinas v-if="currentComponent === 'maquinas'"/>
                <Videos v-if="currentComponent === 'videos'"/>
                <Recaudaciones v-if="currentComponent === 'recaudaciones'"/>
            </div> 
        </div>
    </div>
</template>

<script>
    import Maquinas from '../components/maquinas.vue'
    import Recaudaciones from '../components/recaudaciones.vue'
    import Sidebar from '../components/sidebar.vue'
    import Videos from '../components/videos.vue'
    import Clientes from '../components/clientes.vue'

    export default {
        name:'Dashboard',
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
                currentComponent: 'clientes',
            }
        },
        methods: {
            changeComponent(componentName) {
                this.currentComponent = componentName;
            },
        }
        
    }

</script>

<style scoped>
    .main-container{
        background-color: red;
    }
</style>