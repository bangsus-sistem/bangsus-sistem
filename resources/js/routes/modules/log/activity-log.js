import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'activity_log',
        name: 'log.activityLog',
        component: page('Log/ActivityLog/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'activity_log/read/:id',
        name: 'log.activityLog.read',
        component: page('Log/ActivityLog/Read'),
        beforeEnter: middleware(appMiddleware),
    },
]
