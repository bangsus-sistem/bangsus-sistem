import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'employee/:employeeId/employee_assignment',
        name: 'hrm.employeeAssignment',
        component: page('Hrm/EmployeeAssignment/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'employee/:employeeId/employee_assignment/create',
        name: 'hrm.employeeAssignment.create',
        component: page('Hrm/EmployeeAssignment/Create'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'employee/:employeeId/employee_assignment/read/:id',
        name: 'hrm.employeeAssignment.read',
        component: page('Hrm/EmployeeAssignment/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'employee/:employeeId/employee_assignment/update/:id',
        name: 'hrm.employeeAssignment.update',
        component: page('Hrm/EmployeeAssignment/Update'),
        beforeEnter: middleware(appMiddleware),
    },
]