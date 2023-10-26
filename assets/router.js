import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Maquinas from './components/maquinas.vue'
import Recaudaciones from './components/recaudaciones.vue'
import Videos from './components/videos.vue'
import Clientes from './components/clientes.vue'

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
    }
]

const router = new VueRouter(
    routes
);
  
export default router;
