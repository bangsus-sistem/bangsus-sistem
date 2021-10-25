import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'common_penalty',
        name: 'penalty.commonPenalty',
        component: page('Penalty/CommonPenalty/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'common_penalty/create',
        name: 'penalty.commonPenalty.create',
        component: page('Penalty/CommonPenalty/Create'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'common_penalty/read/:id',
        name: 'penalty.commonPenalty.read',
        component: page('Penalty/CommonPenalty/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'common_penalty/update/:id',
        name: 'penalty.commonPenalty.update',
        component: page('Penalty/CommonPenalty/Update'),
        beforeEnter: middleware(appMiddleware),
    },
]