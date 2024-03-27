import {createRouter, createWebHistory} from 'vue-router';
import Test1 from "../view/Test1.vue";
import Test2 from "../view/Test2.vue";

const routes = [
    {
        path: '/test1',
        name: 'test1',
        component: Test1
    },

    {
        path: '/test2',
        name: 'test2',
        component: Test2
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;