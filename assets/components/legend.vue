<template>
        <h3> {{ title }} </h3>
</template>

<script>
    
    export default {
        name: 'LegendComponent',
        props: {
            title: {
                type: String,
                required: true
            }
        }
    }

</script>

<style scoped>
</style>