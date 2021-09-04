import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'module',
        name: 'system.module',
        component: page('System/Module/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'module/read/:id',
        name: 'system.module.read',
        component: page('System/Module/Read'),
        beforeEnter: middleware(appMiddleware),
    },
]