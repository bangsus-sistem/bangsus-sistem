import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'unit',
        name: 'master.unit',
        component: page('Master/Unit/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'unit/create',
        name: 'master.unit.create',
        component: page('Master/Unit/Create'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'unit/read/:id',
        name: 'master.unit.read',
        component: page('Master/Unit/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'unit/update/:id',
        name: 'master.unit.update',
        component: page('Master/Unit/Update'),
        beforeEnter: middleware(appMiddleware),
    },
]