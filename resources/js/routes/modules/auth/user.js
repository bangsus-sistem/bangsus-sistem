import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'user',
        name: 'auth.user',
        component: page('Auth/User/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'user/create',
        name: 'auth.user.create',
        component: page('Auth/User/Create'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'user/read/:id',
        name: 'auth.user.read',
        component: page('Auth/User/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'user/update/:id',
        name: 'auth.user.update',
        component: page('Auth/User/Update'),
        beforeEnter: middleware(appMiddleware),
    },
]