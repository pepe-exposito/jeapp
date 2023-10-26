<template>
    <div>
        <ul>
            <nav>
                <li> <a href="#" @click="navigateTo('clientes')"> Clientes </a></li>
                <li><a href="#" @click="navigateTo('maquinas')"> Maquinas </a></li>
                <li><a href="#" @click="navigateTo('videos')"> Videos </a></li>
                <li><a href="#" @click="navigateTo('recaudaciones')"> Recaudaciones </a></li>
            </nav>
        </ul>
    </div>
</template>

<script>
    export default {
        name: 'Sidebar',
        data()
        {
            
        },
        methods: {
            navigateTo(componentName) {
                this.$emit('navigate', componentName);
            },
        },
    }
</script>
    
<style scoped>
</style>