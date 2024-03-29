import {createRouter, createWebHistory} from 'vue-router';
import Files from "../view/Files.vue";

const routes = [
    {
        path: '/files',
        name: 'files',
        component: Files
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;