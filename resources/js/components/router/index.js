import { createRouter , createWebHistory } from "vue-router";


import invoicesIndex from '../../components/data/index.vue'

const routes = [

    {
        path: '/',
        component: invoicesIndex,
    },


]







const router = createRouter({
    history: createWebHistory(),
    routes
});


export default router;