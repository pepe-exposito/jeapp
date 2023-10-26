<template>
    <div class="main-container" style="display: block;">
        <h1> Hello {{ firstName }}! This is an API page </h1>

        <div class = "contenedor" style="display: block;">
            <Sidebar/>    
        </div>
        <div class="rv-container"> 
            <router-view/>
        </div>
    </div>
        
</template>

<script>  
import Sidebar from './components/sidebar.vue'
    export default {
        name:'App',
        components: {
            Sidebar,
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

    .rv-container{
        background-color: #ECF7BB;
    }
    
</style>