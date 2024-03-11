import { createWebHistory, createRouter } from "vue-router";
import AdminRoutes from "../routes/AdminRoutes";
import UserRoutes from "../routes/UserRoutes";
import LoginComponent from '../commonComponent/pages/LoginComponent.vue';
const routes = [
    ...AdminRoutes,
    ...UserRoutes,
    {
        path: "/",
        name: "login",
        component: LoginComponent,
        meta: { layout: "public",auth:false },
    },
];

const router = createRouter({
    routes,
    history: createWebHistory(),
});

router.beforeEach

export default router;
