<template>
<component :is="currentComponent"></component>
<Loader />
</template>
<script>
import  AdminLayout  from "../commonComponent/layouts/AdminLayout.vue";
import  UserLayout  from "../commonComponent/layouts/UserLayout.vue";
import Loader from '../commonComponent/pages/Loader.vue';
import LoginComponent from '../commonComponent/pages/LoginComponent.vue';

export default {
    name:'appTemp',
    components:{
        'admin-layout'    :AdminLayout,
        'user-layout'     :UserLayout,
        'public-layout'   :LoginComponent,
        Loader
    },
    computed:{
        currentComponent(){
            console.log("object");
            console.log(this.$route.meta.layout);
            return this.$route.meta.layout+'-layout';
            //return 'admin-layout';
        }
    }  
}
</script>