import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'report',
        name: 'system.report',
        component: page('System/Report/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'report/read/:id',
        name: 'system.report.read',
        component: page('System/Report/Read'),
        beforeEnter: middleware(appMiddleware),
    },
]