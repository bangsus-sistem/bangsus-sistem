import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'employee',
        name: 'hrm.employee',
        component: page('Hrm/Employee/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'employee/create',
        name: 'hrm.employee.create',
        component: page('Hrm/Employee/Create'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'employee/read/:id',
        name: 'hrm.employee.read',
        component: page('Hrm/Employee/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'employee/update/:id',
        name: 'hrm.employee.update',
        component: page('Hrm/Employee/Update'),
        beforeEnter: middleware(appMiddleware),
    },
]