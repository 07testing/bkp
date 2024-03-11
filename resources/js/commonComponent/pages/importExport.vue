<template>
      <div class="inner-content">
    <div class="row">
      <div class="col-md-12">
        <div class="site-card card">
          <div class="card-body">
            <div class="row">
                <div class="col-lg-3">
                  <div class="profile_left_content">
                    <articel class="main_article text-start">
                    <h3> Import & Export </h3>
                    </articel>
                  </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-8">
                    <div class="profile_right_content">
                    <br/>
                    <!-- Content     -->
                  
                    <ul>
                        <li v-for="(value, key) in messageAltCSV" :key="key">
                            {{ value.errors[0] }}
                        </li>
                    </ul>
                    <form @submit.prevent="importCSV">
                        <div class="form-group">
                            <label for="category_name">Import CSV:</label>
                            <input type="file" class="form-control" id="file" required  ref="fileInput" accept=".csv">
                        </div>
                        <br/>
                        <button class="btn btn-primary submit" style="color:black" type="submit" >Import</button>
                    </form>
                    <br/>
                    <button type="button" class="btn btn-primary" @click="exportCSV">Export</button>&nbsp;
                    
                    <!-- Content     -->
                    </div>
                </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
export default {
    name:"ImportComponent", 
    data(){
        return {
            
            messageAltCSV:'',
        }
    },
    methods: {
        async exportCSV(){
            axios.get(import.meta.env.VITE_APP_URL+'api/getCategoryList')
            //axios.get('https://jsonplaceholder.typicode.com/posts')
            .then(res => {
                console.log("res ",res);
                const data = res.message;
                const csvcontent = this.convertCSV(data);
                const blob = new Blob([csvcontent], { type: 'text/csv;charset=utf-8' });
                const url = URL.createObjectURL(blob);
                const link = document.createElement('a');
                link.href = url;
                link.setAttribute('download', 'export data.csv');
                link.click(); 
            })
            .catch(err => {
                console.log("ERRRR", err);
            });
       },
         convertCSV(data){
            const headers = Object.keys(data[0]); // Fix the typo here
            console.log(headers);
            const rows = data.map(obj => headers.map(header => obj[header])); // Fix the typo here
            const headerRow = headers.join(","); // Fix the typo here
            const csvRows = [headerRow, ...rows.map(row => row.join(','))];
            return csvRows.join('\n');
        },
        async importCSV(){
            const fileInput = this.$refs.fileInput;
            const file = fileInput.files[0];
            let formDataCSV = new FormData();
            formDataCSV.append('file', file);
            console.log("formDataCSV", formDataCSV);
             try {
                //axios.post(import.meta.env.VITE_APP_URL+'test/', formDataCSV).
                axios.post(import.meta.env.VITE_APP_URL+'api/categoryImport/', formDataCSV).
                then(res => {
                    console.log("import");
                    console.log(res);
                    if(res.code == "201"){
                        this.messageAltCSV = res.message;
                        console.log("res.message ",res.message);
                        // res.message.map((error) => {
                        //     console.log(`Row ${error.row}, Attribute ${error.attribute}: ${error.errors.join(', ')}`) ;
                        //     this.messageAltCSV = `${error.errors.join(', ')}`;
                        // });
                        return this.messageAltCSV;
                    }
                })
                .catch(err => {
                    console.log("ERRRR", err);
                });
                // Handle success
            } catch (error) {
                console.error('Error importing CSV:', error);
                // Handle error
            }
            //const file = event.target.files[0];
            
        },
    },   
}
</script>
<style scopped>

ul li {
  color: red;
  margin: 5px;
}
</style>