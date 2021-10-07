import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'marketing_activity',
        name: 'master.marketingActivity',
        component: page('Master/MarketingActivity/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'marketing_activity/create',
        name: 'master.marketingActivity.create',
        component: page('Master/MarketingActivity/Create'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'marketing_activity/read/:id',
        name: 'master.marketingActivity.read',
        component: page('Master/MarketingActivity/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'marketing_activity/update/:id',
        name: 'master.marketingActivity.update',
        component: page('Master/MarketingActivity/Update'),
        beforeEnter: middleware(appMiddleware),
    },
]