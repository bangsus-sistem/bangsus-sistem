import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'user',
        name: 'system.user',
        component: page('System/User/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'user/create',
        name: 'system.user.create',
        component: page('System/User/Create'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'user/read/:id',
        name: 'system.user.read',
        component: page('System/User/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'user/update/:id',
        name: 'system.user.update',
        component: page('System/User/Update'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'user/change_password/:id',
        name: 'system.user.changePassword',
        component: page('System/User/ChangePassword'),
        beforeEnter: middleware(appMiddleware),
    },
]