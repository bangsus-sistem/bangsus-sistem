import page from './page'
import middleware from './middleware'

import auth from './modules/auth'
import log from './modules/log'
import system from './modules/system'
import master from './modules/master'
import hrm from './modules/hrm'
import operational from './modules/operational'
import penalty from './modules/penalty'
import report from './modules/report'

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
    {
        path: '/system',
        component: blankComponent,
        children: system,
    },
    {
        path: '/master',
        component: blankComponent,
        children: master,
    },
    {
        path: '/hrm',
        component: blankComponent,
        children: hrm,
    },
    {
        path: '/operational',
        component: blankComponent,
        children: operational,
    },
    {
        path: '/penalty',
        component: blankComponent,
        children: penalty,
    },
    {
        path: '/report',
        component: blankComponent,
        children: report,
    },
]