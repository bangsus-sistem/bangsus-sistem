import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'package',
        name: 'system.package',
        component: page('System/Package/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'package/read/:id',
        name: 'system.package.read',
        component: page('System/Package/Read'),
        beforeEnter: middleware(appMiddleware),
    },
]