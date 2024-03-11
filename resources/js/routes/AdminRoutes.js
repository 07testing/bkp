import AdminOne from "../commonComponent/pages/AdminOne.vue";
import AddCategory from '../commonComponent/pages/AddCategory.vue';
const adminRoute = [
    {
        path: "/admin-one",
        name: "AdminOne",
        component: AdminOne,
        meta: { layout: "admin",auth:true },
    },
    {
        path: "/add-category",
        name: "AddCategory",
        component: AddCategory,
        meta: { layout: "admin",auth:false },
    },    
];
export default adminRoute;
