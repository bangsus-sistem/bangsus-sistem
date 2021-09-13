import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'address_type',
        name: 'hrm.addressType',
        component: page('Hrm/AddressType/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'address_type/create',
        name: 'hrm.addressType.create',
        component: page('Hrm/AddressType/Create'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'address_type/read/:id',
        name: 'hrm.addressType.read',
        component: page('Hrm/AddressType/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'address_type/update/:id',
        name: 'hrm.addressType.update',
        component: page('Hrm/AddressType/Update'),
        beforeEnter: middleware(appMiddleware),
    },
]