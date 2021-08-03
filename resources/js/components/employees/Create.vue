<template>
    <div>
        <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mb-0 text-gray-800">Create Employee</h1>
            <router-link :to="{name: 'EmployeesIndex'}" class="btn btn-success float-right">Employees List</router-link>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Employee</div>

                    <div class="card-body">
                        <form @submit.prevent="storeEmployee">
                            <div class="form-group row">
                                <label
                                    for="first_name"
                                    class="col-md-4 col-form-label text-md-right">First Name
                                </label>
                                <div class="col-md-6">
                                    <input
                                        id="first_name"
                                        v-model="form.first_name"
                                        type="text"
                                        class="form-control"
                                        required
                                    />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="middle_name"
                                    class="col-md-4 col-form-label text-md-right">Midlle Name
                                </label>
                                <div class="col-md-6">
                                    <input
                                        id="middle_name"
                                        v-model="form.middle_name"
                                        type="text"
                                        class="form-control"
                                        required
                                    />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="last_name"
                                    class="col-md-4 col-form-label text-md-right">Last Name
                                </label>
                                <div class="col-md-6">
                                    <input
                                        id="last_name"
                                        v-model="form.last_name"
                                        type="text"
                                        class="form-control"
                                        required
                                    />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="address"
                                    class="col-md-4 col-form-label text-md-right">Address
                                </label>
                                <div class="col-md-6">
                                    <input
                                        id="address"
                                        v-model="form.address"
                                        type="text"
                                        class="form-control"
                                        required
                                    />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="department"
                                    class="col-md-4 col-form-label text-md-right">Department</label>

                                <div class="col-md-6">
                                    <select
                                        v-model="form.department_id"
                                        @change="getDepartments()"
                                        name="department_id"
                                        class="form-control">

                                        <option
                                            v-for="department in departments"
                                            :key="department.id"
                                            :value="department.id">{{ department.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country_id"
                                    class="col-md-4 col-form-label text-md-right">Country</label>

                                <div class="col-md-6">
                                    <select
                                        v-model="form.country_id"
                                        @change="getStates()"
                                        name="country_id"
                                        class="form-control">

                                        <option
                                            v-for="country in countries"
                                            :key="country.id"
                                            :value="country.id">{{ country.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="state"
                                    class="col-md-4 col-form-label text-md-right">State</label>

                                <div class="col-md-6">
                                    <select
                                        v-model="form.state_id"
                                        @change="getCities()"
                                        name="state_id"
                                        class="form-control">

                                        <option
                                            v-for="state in states"
                                            :key="state.id"
                                            :value="state.id">{{ state.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city"
                                    class="col-md-4 col-form-label text-md-right">City</label>

                                <div class="col-md-6">
                                    <select
                                        v-model="form.city_id"
                                        @change="getCities()"
                                        name="city_id"
                                        class="form-control">

                                        <option
                                            v-for="city in cities"
                                            :key="city.id"
                                            :value="city.id">{{ city.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="zip_code"
                                    class="col-md-4 col-form-label text-md-right">Zip Code
                                </label>
                                <div class="col-md-6">
                                    <input
                                        id="zip_code"
                                        v-model="form.zip_code"
                                        type="text"
                                        class="form-control"
                                        required
                                    />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="birthdate"
                                    class="col-md-4 col-form-label text-md-right">BirthDate
                                </label>
                                <div class="col-md-6">
                                    <datepicker
                                        v-model="form.birthdate"
                                        input-class="form-control">
                                    </datepicker>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="date_hired"
                                    class="col-md-4 col-form-label text-md-right">Hire Date
                                </label>
                                <div class="col-md-6">
                                    <datepicker
                                        v-model="form.date_hired"
                                        input-class="form-control">
                                    </datepicker>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Store</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Datepicker from 'vuejs-datepicker';
import moment from 'moment'
    export default {
    data(){
        return {
            countries   : [],
            states      : [],
            cities      : [],
            departments : [],
            form: {
                first_name  : '',
                middle_name : '',
                last_name   : '',
                address     : '',
                department_id : '',
                country_id  : '',
                state_id    : '',
                city_id     : '',
                zip_code    : '',
                birthdate   : null,
                date_hired  : null,
            }
        }
    },
    created(){
        this.getCountries(),
        this.getDepartments()
    },
    methods : {
        getCountries(){
            axios.get('/api/employees/countries')
                .then(response => {
                    this.countries = response.data
                }).catch(error => {
                    console.log(error)
                })
        },
        getStates(){
            axios.get("/api/employees/"+this.form.country_id+"/states")
                .then(response => {
                    this.states = response.data
                }).catch(error => {
                    console.log(error)
                })
        },
        getCities(){
            axios.get("/api/employees/"+this.form.state_id+"/cities")
                .then(response => {
                    this.cities = response.data
                }).catch(error => {
                    console.log(error)
                })
        },
        getDepartments(){
            axios.get('/api/employees/departments')
                .then(response => {
                    this.departments = response.data
                }).catch(error => {
                    console.log(error)
                })
        },
        storeEmployee(){
            axios.post('/api/employees', {
                'first_name'    : this.form.first_name,
                'middle_name'   : this.form.middle_name,
                'last_name'     : this.form.last_name,
                'address'       : this.form.address,
                'department_id' : this.form.department_id,
                'country_id'    : this.form.country_id,
                'state_id'      : this.form.state_id,
                'city_id'       : this.form.city_id,
                'zip_code'      : this.form.zip_code,
                'birthdate'     : this.format_date(this.form.birthdate),
                'date_hired'    : this.format_date(this.form.date_hired),
            }).then(response => {
                console.log(response)
                this.$router.push('/employees')
            }).catch(error => {
                console.log(error)
            })
        },
        format_date(value){
            if (value) {
                return moment(String(value)).format('YYYYMMDD')
            }
        }
    },
    components: {
        Datepicker
    }
}

</script>

<style lang="scss" scoped>

</style>
