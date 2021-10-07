import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'marketing_item',
        name: 'master.marketingItem',
        component: page('Master/MarketingItem/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'marketing_item/create',
        name: 'master.marketingItem.create',
        component: page('Master/MarketingItem/Create'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'marketing_item/read/:id',
        name: 'master.marketingItem.read',
        component: page('Master/MarketingItem/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'marketing_item/update/:id',
        name: 'master.marketingItem.update',
        component: page('Master/MarketingItem/Update'),
        beforeEnter: middleware(appMiddleware),
    },
]