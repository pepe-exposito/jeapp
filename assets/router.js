import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Maquinas from './components/Maquinas.vue'
import Recaudaciones from './components/Recaudaciones.vue'
import Videos from './components/Videos.vue'
import Clientes from './components/Clientes.vue'

import NuevoCliente from './clientes/NuevoCliente.vue'
import Cliente from './clientes/Cliente.vue'
import ModificarCliente from './clientes/ModificarCliente.vue'
import EliminarCliente from './clientes/EliminarCliente.vue'

import NuevaMaquina from './maquinas/NuevaMaquina.vue'
import Maquina from './maquinas/Maquina.vue'
import ModificarMaquina from './maquinas/ModificarMaquina.vue'
import EliminarMaquina from './maquinas/EliminarMaquina.vue'

import NuevoVideo from './videos/NuevoVideo.vue'
import Video from './videos/Video.vue'
import ModificarVideo from './videos/ModificarVideo.vue'
import EliminarVideo from './videos/EliminarVideo.vue'

import NuevaRecaudacion from './recaudaciones/NuevaRecaudacion.vue'
import Recaudacion from './recaudaciones/Recaudacion.vue'
import ModificarRecaudacion from './recaudaciones/ModificarRecaudacion.vue'
import EliminarRecaudacion from './recaudaciones/EliminarRecaudacion.vue'

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
    path: '/clientes/create',
    component: NuevoCliente,
    name: 'crear_cliente'
    },
    {   
    path: '/clientes/show/:id',
    component: Cliente,
    name: 'cliente_show'
    },
    {
    path: '/clientes/update/:id',
    component: ModificarCliente,
    name: 'modificar_cliente'
    },
    {
    path: '/clientes/delete/:id',
    component: EliminarCliente,
    name: 'borrar_cliente'
    },
    {
    path: '/maquinas/create',
    component: NuevaMaquina,
    name: 'crear_maquina'
    },
    {   
    path: '/maquinas/show/:id',
    component: Maquina,
    name: 'maquina_show'
    },
    {
    path: '/maquinas/update/:id',
    component: ModificarMaquina,
    name: 'modificar_maquina'
    },
    {
    path: '/maquinas/delete/:id',
    component: EliminarMaquina,
    name: 'borrar_maquina'
    },
    {
    path: '/videos/create',
    component: NuevoVideo,
    name: 'crear_video'
    },
    {   
    path: '/videos/show/:id',
    component: Video,
    name: 'video_show'
    },
    {
    path: '/videos/update/:id',
    component: ModificarVideo,
    name: 'modificar_video'
    },
    {
    path: '/videos/delete/:id',
    component: EliminarVideo,
    name: 'borrar_video'
    },

    {
    path: '/recaudaciones/create',
    component: NuevaRecaudacion,
    name: 'crear_recaudacion'
    },
    {   
    path: '/recaudaciones/show/:id',
    component: Recaudacion,
    name: 'recaudacion_show'
    },
    {
    path: '/recaudaciones/update/:id',
    component: ModificarRecaudacion,
    name: 'modificar_recaudacion'
    },
    {
    path: '/recaudaciones/delete/:id',
    component: EliminarRecaudacion,
    name: 'borrar_recaudacion'
    }
]

const router = new VueRouter({
    routes: routes 
});
  
export default router;
