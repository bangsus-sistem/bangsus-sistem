import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'authentication_log',
        name: 'log.authenticationLog',
        component: page('Log/AuthenticationLog/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'authentication_log/read/:id',
        name: 'log.authenticationLog.read',
        component: page('Log/AuthenticationLog/Read'),
        beforeEnter: middleware(appMiddleware),
    },
]
