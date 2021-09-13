import page from './page'
import middleware from './middleware'

import auth from './modules/auth'
import log from './modules/log'
// import system from './modules/system'
import hrm from './modules/hrm'

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
        path: '/auth',
        component: blankComponent,
        children: auth,
    },
    {
        path: '/log',
        component: blankComponent,
        children: log,
    },
    // {
    //     path: '/system',
    //     component: blankComponent,
    //     children: system,
    // },
    {
        path: '/hrm',
        component: blankComponent,
        children: hrm,
    },
]