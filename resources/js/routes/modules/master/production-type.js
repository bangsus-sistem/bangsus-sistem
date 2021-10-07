import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'production_type',
        name: 'master.productionType',
        component: page('Master/ProductionType/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'production_type/create',
        name: 'master.productionType.create',
        component: page('Master/ProductionType/Create'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'production_type/read/:id',
        name: 'master.productionType.read',
        component: page('Master/ProductionType/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'production_type/update/:id',
        name: 'master.productionType.update',
        component: page('Master/ProductionType/Update'),
        beforeEnter: middleware(appMiddleware),
    },
]