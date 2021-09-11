import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'role',
        name: 'auth.role',
        component: page('Auth/Role/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'role/create',
        name: 'auth.role.create',
        component: page('Auth/Role/Create'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'role/read/:id',
        name: 'auth.role.read',
        component: page('Auth/Role/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'role/update/:id',
        name: 'auth.role.update',
        component: page('Auth/Role/Update'),
        beforeEnter: middleware(appMiddleware),
    },
]