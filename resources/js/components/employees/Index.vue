<template>
    <div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Employees</h1>
            <router-link :to="{name: 'EmployeesCreate'}" class="btn btn-success float-right">Create Employee</router-link>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div v-if="showMessage">
                    <div class="alert alert-success">{{ message }}</div>
                </div>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Department</th>
                            <th scope="col">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="employee in employees" :key="employee.id">
                            <th>#{{ employee.id }}</th>
                            <th>{{ employee.first_name }}</th>
                            <th>{{ employee.last_name }}</th>
                            <th>{{ employee.address }}</th>
                            <th>{{ employee.department.name }}</th>
                            <td>
                                <router-link :to="{name: 'EmployeesEdit', params: {id: employee.id}}"  class="btn btn-warning btn-sm">Edit</router-link>
                                <button class="btn btn-danger" @click="deleteEmployee(employee.id)">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                employees : [],
                showMessage: false,
                message: ''
            }
        },
        created(){
            this.getEmployess()
        },
        methods: {
            getEmployess(){
            axios.get('/api/employees')
                .then(response => {
                    this.employees = response.data.data
                }).catch(error => {
                    console.log(error)
                })
            },
            deleteEmployee(id){
                axios.delete('/api/employees/'+id).then(response => {
                    this.showMessage = true
                    this.message = response.data
                    this.getEmployess()
                })
            }
        }
    }

</script>

<style lang="scss" scoped>

</style>
