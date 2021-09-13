import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'division',
        name: 'hrm.division',
        component: page('Hrm/Division/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'division/create',
        name: 'hrm.division.create',
        component: page('Hrm/Division/Create'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'division/read/:id',
        name: 'hrm.division.read',
        component: page('Hrm/Division/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'division/update/:id',
        name: 'hrm.division.update',
        component: page('Hrm/Division/Update'),
        beforeEnter: middleware(appMiddleware),
    },
]