<template>
    <div>
        <ul>
            <!-- <li v-for="category in categories">
                <a :href="category.link"> {{ category.name }} </a>
            </li> -->
            <li> <a href="#" @click="navigateTo('clientes')"> Clientes </a></li>
            <li><a href="#" @click="navigateTo('maquinas')"> Maquinas </a></li>
            <li><a href="#" @click="navigateTo('videos')"> Videos </a></li>
            <li><a href="#" @click="navigateTo('recaudaciones')"> Recaudaciones </a></li>
            
        </ul>
    </div>
</template>

<script>
    export default {
        name: 'Sidebar',
        data()
        {
            return {
                categories: [
                    {
                        name: 'clientes',
                        link: '#'
                    },
                    {
                        name: 'maquinas',
                        link: '#'
                    },
                    {
                        name: 'recaudaciones',
                        link: '#'
                    },
                    {
                        name: 'videos',
                        link: '#'
                    }
                ]
            }
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