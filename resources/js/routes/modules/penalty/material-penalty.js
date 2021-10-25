import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'material_penalty',
        name: 'penalty.materialPenalty',
        component: page('Penalty/MaterialPenalty/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'material_penalty/create',
        name: 'penalty.materialPenalty.create',
        component: page('Penalty/MaterialPenalty/Create'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'material_penalty/read/:id',
        name: 'penalty.materialPenalty.read',
        component: page('Penalty/MaterialPenalty/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'material_penalty/update/:id',
        name: 'penalty.materialPenalty.update',
        component: page('Penalty/MaterialPenalty/Update'),
        beforeEnter: middleware(appMiddleware),
    },
]