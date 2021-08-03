import EmployeesIndex from './components/employees/Index.vue'
import EmployeesCreate from './components/employees/Create.vue'
import EmployeesEdit from './components/employees/Edit.vue'

export const routes = [
    {
        path: '/employees',
        component: EmployeesIndex,
        name: 'EmployeesIndex'
    },
    {
        path: '/employees/create',
        component: EmployeesCreate,
        name: 'EmployeesCreate'
    },
    {
        path: '/employees/:id',
        component: EmployeesEdit,
        name: 'EmployeesEdit'
    }
]
