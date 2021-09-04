import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'feature',
        name: 'system.feature',
        component: page('System/Feature/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'feature/read/:id',
        name: 'system.feature.read',
        component: page('System/Feature/Read'),
        beforeEnter: middleware(appMiddleware),
    },
]