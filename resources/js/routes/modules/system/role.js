import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'role',
        name: 'system.role',
        component: page('System/Role/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'role/create',
        name: 'system.role.create',
        component: page('System/Role/Create'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'role/read/:id',
        name: 'system.role.read',
        component: page('System/Role/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'role/update/:id',
        name: 'system.role.update',
        component: page('System/Role/Update'),
        beforeEnter: middleware(appMiddleware),
    },
]