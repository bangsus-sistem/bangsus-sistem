import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'contact_type',
        name: 'hrm.contactType',
        component: page('Hrm/ContactType/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'contact_type/create',
        name: 'hrm.contactType.create',
        component: page('Hrm/ContactType/Create'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'contact_type/read/:id',
        name: 'hrm.contactType.read',
        component: page('Hrm/ContactType/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'contact_type/update/:id',
        name: 'hrm.contactType.update',
        component: page('Hrm/ContactType/Update'),
        beforeEnter: middleware(appMiddleware),
    },
]