import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'gender',
        name: 'hrm.gender',
        component: page('Hrm/Gender/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'gender/create',
        name: 'hrm.gender.create',
        component: page('Hrm/Gender/Create'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'gender/read/:id',
        name: 'hrm.gender.read',
        component: page('Hrm/Gender/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'gender/update/:id',
        name: 'hrm.gender.update',
        component: page('Hrm/Gender/Update'),
        beforeEnter: middleware(appMiddleware),
    },
]