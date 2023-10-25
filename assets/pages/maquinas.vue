<template>
    <div style="display: block;">
        <h1> Hello {{ firstName }}! This is an API page </h1>
        <div> <Sidebar/> </div>
        <div> <Catalog/> </div>   
    </div>
</template>

<script>
    import Catalog from '../components/catalog.vue'
    import Sidebar from '../components/sidebar.vue'

    export default {
        name:'Maquinas',
        components: {
            Catalog,
            Sidebar
        },
        data(){
            return {
                firstName: 'cliente',
            }
        },
    }

</script>

<style module>

    h1{
        background-color: red;
    }

</style>