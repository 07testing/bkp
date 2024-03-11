import UserOne from "../commonComponent/pages/UserOne.vue";
const userRoute = [
    {
        path: "/user-one",
        name: "UserOne",
        component: UserOne,
        meta: { layout: "user",auth:true },
    }
];
export default userRoute;
