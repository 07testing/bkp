<template>
    <div class="container">
        <h2>Login</h2>
        <form @submit.prevent="login">
            <div class="form-group">
                <label for="email">Username:</label>
                <input type="text" class="form-control" id="email" v-model="loginData.email">
                 <div class="input-errors" v-for="error of v$.loginData.email.$errors" :key="error.$uid">
                    <div class="error-msg">{{ error.$message }}</div>
                </div>
            </div>
            <br/>
            <div class="form-group">
                <label for="password">password:</label>
                <input type="text" class="form-control" id="password" v-model="loginData.password">
                 <div class="input-errors" v-for="error of v$.loginData.password.$errors" :key="error.$uid">
                    <div class="error-msg">{{ error.$message }}</div>
                </div>
            </div>
            <br/>
            <div class="form-group">
                <label for="role">Role:</label>
                <select class="form-control" v-model="loginData.role">
                  <option value="1">Admin</option>
                  <option value="2">User</option>
                </select>
                 <div class="input-errors" v-for="error of v$.loginData.role.$errors" :key="error.$uid">
                    <div class="error-msg">{{ error.$message }}</div>
                </div>
            </div>
            <br/>
            <button class="btn btn-primary submit" style="color:black" type="submit" >Login</button>
        </form>
        <!-- <a> <router-link class="navbar-brand" :to="{name:'register'}">Registration</router-link> </a> -->
    </div>
</template>
<script>
import { useVuelidate } from '@vuelidate/core'
import { required, email } from '@vuelidate/validators'

export default {
    name:'LoginComponent',
    data(){
        return {
            loginData:{
                email   :null,
                password:null,
                role    :null,
            },
            v$: useVuelidate(),
        }
    },
    validations () {
        return {
            loginData: {
                email   : { required }, // Matches this.contact.email
                password: { required }, // Matches this.contact.email
                role    : { required }, // Matches this.contact.email
            }
        }
    },
    methods: {
        async login(){
            try {
                const isLoginCorrect = await this.v$.$validate();
                if(isLoginCorrect){
                    const result = await this.$store.dispatch('checkLoging',this.loginData);
                    console.log(this.loginData.role);
                    localStorage.setItem("token", result.data.data.token);
                    localStorage.setItem("role", this.loginData.role);
                }
            } catch (error) {
                console.error("Error fetching selling list:", error);
            } finally {

            }

        }
    },    
}
</script>
<style scoped>
.input-errors{
    background-color: #920404;
    padding: 5px;
    color: #f0eaea;
    margin-top: 5px;
    border-radius: 2px;
}
</style>