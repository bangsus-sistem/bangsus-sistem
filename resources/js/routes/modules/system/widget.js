import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'widget',
        name: 'system.widget',
        component: page('System/Widget/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'widget/read/:id',
        name: 'system.widget.read',
        component: page('System/Widget/Read'),
        beforeEnter: middleware(appMiddleware),
    },
]