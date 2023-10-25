<template>
    <div>
        <ul>
            <li v-for="category in categories">
                <a :href="category.link"> {{ category.name }} </a>
            </li>
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
        }
    }
</script>
    
<style scoped>
    ul{
        background-color: green;
    }
</style>