<template>
    <UserHeader />
    <router-view></router-view>
</template>
<script>
import UserHeader from '../shared/UserHeader.vue'
export default {
    name:'UserLayout',
    components:{
        UserHeader
    }    
}
</script>