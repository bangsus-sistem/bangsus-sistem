import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'general_cleaning_activity',
        name: 'master.generalCleaningActivity',
        component: page('Master/GeneralCleaningActivity/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'general_cleaning_activity/create',
        name: 'master.generalCleaningActivity.create',
        component: page('Master/GeneralCleaningActivity/Create'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'general_cleaning_activity/read/:id',
        name: 'master.generalCleaningActivity.read',
        component: page('Master/GeneralCleaningActivity/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'general_cleaning_activity/update/:id',
        name: 'master.generalCleaningActivity.update',
        component: page('Master/GeneralCleaningActivity/Update'),
        beforeEnter: middleware(appMiddleware),
    },
]