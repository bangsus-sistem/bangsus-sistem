import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'operational_photo',
        name: 'operational.operationalPhoto',
        component: page('Operational/OperationalPhoto/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'operational_photo/create',
        name: 'operational.operationalPhoto.create',
        component: page('Operational/OperationalPhoto/Create'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'operational_photo/read/:id',
        name: 'operational.operationalPhoto.read',
        component: page('Operational/OperationalPhoto/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'operational_photo/update/:id',
        name: 'operational.operationalPhoto.update',
        component: page('Operational/OperationalPhoto/Update'),
        beforeEnter: middleware(appMiddleware),
    },
]