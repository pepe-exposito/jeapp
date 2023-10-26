import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Maquinas from './components/Maquinas.vue'
import Recaudaciones from './components/Recaudaciones.vue'
import Videos from './components/Videos.vue'
import Clientes from './components/Clientes.vue'
import NuevoCliente from './clientes/NuevoCliente.vue'/* 
import Cliente from '.clientes/Cliente.vue'
import ModificarCliente from '.clientes/ModificarCliente.vue' */

const routes = [
    {
    path: '/clientes',
    component: Clientes,
    name: 'clientes'
    },
    {
    path: '/maquinas',
    component: Maquinas,
    name: 'maquinas'
    },
    {
    path: '/recaudaciones',
    component: Recaudaciones,
    name: 'recaudaciones'
    },
    {
    path: '/videos',
    component: Videos,
    name: 'videos'
    },
    {
    path: '/cliente/create',
    component: NuevoCliente,
    name: 'crear_cliente'
    },
    /* {   
    path: '/cliente/show/{id}',
    component: Cliente,
    name: 'cliente_show'
    },
    {
    path: '/cliente/update',
    component: ModificarCliente,
    name: 'modificar_cliente'
    } */
]

const router = new VueRouter({
    routes: routes 
});
  
export default router;
