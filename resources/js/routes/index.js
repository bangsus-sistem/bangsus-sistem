import page from './page'
import middleware from './middleware'

import log from './modules/log'
import auth from './modules/auth'

const appMiddleware = ['authenticated', 'versionCheck']
const blankComponent = { template: '<router-view></router-view>' }

export default [
    {
        path: '/login',
        name: 'login',
        component: page('Login'),
        beforeEnter: middleware(['unauthenticated']),
    },
    {
        path: '/logout',
        name: 'logout',
        component: page('Logout'),
        beforeEnter: middleware(['authenticated']),
    },
    {
        path: '/dashboard',
        name: 'dashboard',
        component: page('Dashboard'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: '/log',
        component: blankComponent,
        children: log,
    },
    {
        path: '/auth',
        component: blankComponent,
        children: auth,
    },
]