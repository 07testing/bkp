<template>
<div class="container">
    Category
    <div class="row">
        <form @submit.prevent="submitForm">
            <div class="form-group">
                <label for="category_name">Category Name:</label>
                <input type="text" class="form-control" id="category_name" v-model="formData.category_name">
                 <div class="input-errors" v-for="error of v$.formData.category_name.$errors" :key="error.$uid">
                    <div class="error-msg">{{ error.$message }}</div>
                </div>
            </div>
            <br/>
            <button class="btn btn-primary submit" style="color:black" type="submit" >Submit</button>
        </form>
    </div>
</div>
</template>
<script>

import { useVuelidate } from '@vuelidate/core'
import { required, email } from '@vuelidate/validators'
export default {
    name:'AddCategory',
    data(){
        return {
            formData:{
                category_name:null,
            },
            v$: useVuelidate(),
        }
    },
    validations () {
        return {
            formData: {
                category_name: { required }, // Matches this.contact.email
            }
        }
    },
    methods:{
        async submitForm(){
            try {
                const isFormCorrect = await this.v$.$validate();
                if(isFormCorrect){
                    console.log("data");
                    console.log(this.formData);
                    const result = await this.$store.dispatch("addCategory",this.formData);
                    console.log(result);
                    this.formData.category_name='';
                }
            } catch (error) {
                console.error("Error fetching selling list:", error);
            } finally {

            }

        }
    }    
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