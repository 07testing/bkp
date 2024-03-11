<template>
    <AdminHeader />
    <router-view></router-view>
</template>
<script>
import AdminHeader from '../shared/AdminHeader.vue'
export default {
    name:'AdminLayout',
    components:{
        AdminHeader
    }    
}
</script>