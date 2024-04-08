import {createRouter, createWebHistory} from 'vue-router';
import Files from "../view/Files.vue";
import AddFile from "../view/AddFile.vue";
import NotFounde from "../view/NotFound.vue";

const routes = [
    {
        path: '/files',
        name: 'files',
        component: Files
    },
    {
        path: '/add-file',
        name: 'addfile',
        component: AddFile
    },
    {
        path: '/:pathMatch(.*)',
        name: 'notfound',
        component: NotFounde,
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;