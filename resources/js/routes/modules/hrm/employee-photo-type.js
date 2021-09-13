import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'employee_photo_type',
        name: 'hrm.employeePhotoType',
        component: page('Hrm/EmployeePhotoType/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'employee_photo_type/create',
        name: 'hrm.employeePhotoType.create',
        component: page('Hrm/EmployeePhotoType/Create'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'employee_photo_type/read/:id',
        name: 'hrm.employeePhotoType.read',
        component: page('Hrm/EmployeePhotoType/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'employee_photo_type/update/:id',
        name: 'hrm.employeePhotoType.update',
        component: page('Hrm/EmployeePhotoType/Update'),
        beforeEnter: middleware(appMiddleware),
    },
]