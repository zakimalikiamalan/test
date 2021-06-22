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
            <select v-model="selectedPosition" @change="choosePosition($event)" name="position" id="position" class="form-control" tabindex="12">
            <option v-for="(position) in positions" :key="position.id" :value="position.id">{{ position.name }}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="departement">Departement</label>
            <select v-model="selectedDepartement" @change="chooseDepartement($event)" name="departement" id="departement" class="form-control" tabindex="12">
            <option v-for="(departement) in departements" :key="departement.id" :value="departement.id">{{ departement.name }}</option>
            </select>
        </div>
          <div class="form-group">
            <label for="office">Office</label>
        <select v-model="selectedOffice" @change="chooseOffice($event)" name="office" id="office" class="form-control" tabindex="12">
            <option v-for="(office) in offices" :key="office.id" :value="office.id">{{ office.name }}</option>
        </select>
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
            <tr v-for="(table,i) in employer" :key="i">
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
                selectedPosition:"",
                selectedOffice:"",
                selectedDepartement:"",
                offices:{},
                departements:{},
                positions:{},
                employer:{},
                form:{
                    id:'',
                    first_name :'',
                    last_name :'',  
                    email_address :'',
                    phone_number :'',
                    position_id :'',
                    departement_id  :'',
                    office_id :''
                }
            }
        },
        methods:{
            chooseDepartement(event){
                this.form.departement_id  = event.target.value;
                console.log(this.form.departement_id)
            },
            choosePosition(event){
                this.form.position_id = event.target.value;
                console.log(this.form.position_id)
            },
            chooseOffice(event){
                this.form.office_id= event.target.value;
                console.log(this.form.office_id)
            },
            load(){
                axios
                .get('http://test.test/api/employer')
                .then((response) => {
                this.employer = response.data
                console.log(this.employer)
                })
                axios
                .get('http://test.test/api/departement')
                .then((response) => {
                this.departements = response.data;
                console.log(this.departements)
                })
                axios
                .get('http://test.test/api/office')
                .then((response) => {
                this.offices = response.data;
                console.log(this.offices)
                })
                axios
                .get('http://test.test/api/position')
                .then((response) => {
                this.positions = response.data;
                console.log(this.positions)
                })
            },
            postData(){
                axios
                .post('http://test.test/api/employer', this.form)
                .then((response) => {
                this.load();
                console.log(response)
                })
            },
            postDataDelete(){
                axios
                .post('http://test.test/api/employer', this.form)
                .then((response) => {
                    this.form.id = '';
                    this.form.first_name ='',
                    this.form.last_name ='',  
                    this.form.email_address ='',
                    this.form.phone_number ='',
                    this.selectedPosition ='',
                    this.selectedDepartement  ='',
                    this.selectedOffice =''
                this.load();
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