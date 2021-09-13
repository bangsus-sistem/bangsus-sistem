import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'employee/:employeeId/employee_assignment/:employeeAssignmentId/employee_mutation',
        name: 'hrm.employeeMutation',
        component: page('Hrm/EmployeeMutation/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'employee/:employeeId/employee_assignment/:employeeAssignmentId/employee_mutation/create',
        name: 'hrm.employeeMutation.create',
        component: page('Hrm/EmployeeMutation/Create'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'employee/:employeeId/employee_assignment/:employeeAssignmentId/employee_mutation/read/:id',
        name: 'hrm.employeeMutation.read',
        component: page('Hrm/EmployeeMutation/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'employee/:employeeId/employee_assignment/:employeeAssignmentId/employee_mutation/update/:id',
        name: 'hrm.employeeMutation.update',
        component: page('Hrm/EmployeeMutation/Update'),
        beforeEnter: middleware(appMiddleware),
    },
]