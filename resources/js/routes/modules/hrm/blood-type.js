import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'blood_type',
        name: 'hrm.bloodType',
        component: page('Hrm/BloodType/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'blood_type/create',
        name: 'hrm.bloodType.create',
        component: page('Hrm/BloodType/Create'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'blood_type/read/:id',
        name: 'hrm.bloodType.read',
        component: page('Hrm/BloodType/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'blood_type/update/:id',
        name: 'hrm.bloodType.update',
        component: page('Hrm/BloodType/Update'),
        beforeEnter: middleware(appMiddleware),
    },
]