<template>
    <div class="container">
        <div class="card my-4" >
            <div class="card-body " >
        <div class="row">
            <div class="col-sm-6">
        <div class="form-group">
            <label for="first">First Name</label>
            <input type="text" class="form-control" id="first" aria-describedby="first" placeholder="First Name" v-model="form.first_name">
        </div>
        <div class="form-group">
            <label for="last">Last Name</label>
            <input type="text" class="form-control" id="last" aria-describedby="last" placeholder="Last Name" v-model="form.last_name">
        </div>
          <div class="form-group">
            <label for="Employer">Employer ID</label>
            <input type="text" class="form-control" id="Employer" aria-describedby="Employer" placeholder="Employer ID" v-model="form.id">
        </div>
        <div class="form-group">
            <label for="email">E-mail Address</label>
            <input type="text" class="form-control" id="email" placeholder="E-mail Address" v-model="form.email_address">
        </div>
            </div>
        <div class="col-sm-6">
        <div class="form-group">
            <label for="position">Position</label>
            <input type="text" class="form-control" id="position" aria-describedby="position" placeholder="Position" v-model="form.position_name">
        </div>
        <div class="form-group">
            <label for="departement">Departement</label>
            <input type="text" class="form-control" id="departement" placeholder="Departement" v-model="form.departement_name">
        </div>
          <div class="form-group">
            <label for="office">Office</label>
            <input type="text" class="form-control" id="office" aria-describedby="office" placeholder="Office" v-model="form.office_name">
        </div>
        <div class="form-group">
            <label for="phone number">Phone Number</label>
            <input type="text" class="form-control" id="phone number" placeholder="Phone Number" v-model="form.phone_number">
        </div>
        <div>
            <div class="row">
                <div class="col-6">
                    <div href="#" class="btn btn-primary" style="width: 160px;" @click="postDataDelete">Save & Clear</div>
                </div>
                <div class="col-6">
                    <div href="#" class="btn btn-success" style="width: 160px;" @click="postData">Save</div>
                </div>
            </div>
            </div>
            </div>
            </div>
        </div>
        </div>
        <table>
   <thead>
    <tr class="headtable">
      <th></th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>E-mail Address</th>
      <th>Phone Number</th>
      <th>Position</th>
      <th>Departement</th>
      <th>Office</th>
    </tr>
  </thead>
        <tbody>
            <tr v-for="(table,i) in tables" :key="i">
            <th scope="row">{{ table.id  }}</th>  
            <td>{{ table.first_name }}</td>
            <td>{{ table.last_name }}</td>  
            <td>{{ table.email_address }}</td> 
            <td>{{ table.phone_number }}</td> 
            <td>{{ table.position.name }}</td>
            <td>{{ table.departement.name}}</td>  
            <td>{{ table.office.name }}</td>
            </tr>
        </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.load();
        },
        data(){
            return{
                tables:{},
                form:{
                    id:'',
                    first_name :'',
                    last_name :'',  
                    email_address :'',
                    phone_number :'',
                    position_id :'',
                    departement_name  :'',
                    office_name :''
                }
            }
        },
        methods:{
            load(){
                axios
                .get('http://test.test/api/employer')
                .then((response) => {
                    this.tables = response.data
                console.log(this.tables)
                })
            },
            postData(){
                axios
                .post('http://test.test/api/employer', this.form)
                .then((response) => {
                    // this.tables = response.data;
                console.log(response)
                })
            },
            postDataDelete(){
                axios
                .post('http://test.test/api/employer', this.form)
                .then((response) => {
                    // this.first_name =''
                    // this.last_name =''  
                    // this.email_address =''
                    // this.phone_number =''
                    // this.position_name =''
                    // this.departement_name  =''
                    // this.office_name =''
                console.log(response)
                })
            }
        }
    }
</script>
<style scoped>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }
    
    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
    
    .headtable {
        background-color: #dddddd;
    }
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
}
</style>