<template>
<div>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">User</a>
            </div>
            <ul class="nav navbar-nav">
              <li class="active"><router-link class="navbar-brand" :to="{ name: 'UserOne' }">User 1 </router-link></li>
            </ul>
        </div>
    </nav>
</div>
</template>
<script>
export default {
    name:'AdminHeader'    
}
</script>