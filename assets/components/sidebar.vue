<template>
    <div>
        <ul>
            <nav>
                <router-link to="/clientes">Clientes</router-link>
                <router-link to="/maquinas">Máquinas</router-link>
                <router-link to="/videos">Videos</router-link>
                <router-link to="/recaudaciones">Recaudaciones</router-link>
            </nav>
        </ul>
    </div>
</template>

<script>

    export default {
        name: 'Sidebar',
    }
</script>
    
<style scoped>
</style>