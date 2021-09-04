import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'action',
        name: 'system.action',
        component: page('System/Action/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'action/read/:id',
        name: 'system.action.read',
        component: page('System/Action/Read'),
        beforeEnter: middleware(appMiddleware),
    },
]