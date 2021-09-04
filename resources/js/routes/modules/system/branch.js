import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'branch',
        name: 'system.branch',
        component: page('System/Branch/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'branch/create',
        name: 'system.branch.create',
        component: page('System/Branch/Create'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'branch/read/:id',
        name: 'system.branch.read',
        component: page('System/Branch/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'branch/update/:id',
        name: 'system.branch.update',
        component: page('System/Branch/Update'),
        beforeEnter: middleware(appMiddleware),
    },
]