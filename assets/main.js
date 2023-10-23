import Vue from 'vue';

new Vue ({
    el: '#app',
    data(){

        return {
            firstName: 'Pepe',
        }

    },
    template: '<h1> Hello {{ firstName }}! Is this cooler?'
})
