import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'operational_photo_type',
        name: 'master.operationalPhotoType',
        component: page('Master/OperationalPhotoType/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'operational_photo_type/create',
        name: 'master.operationalPhotoType.create',
        component: page('Master/OperationalPhotoType/Create'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'operational_photo_type/read/:id',
        name: 'master.operationalPhotoType.read',
        component: page('Master/OperationalPhotoType/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'operational_photo_type/update/:id',
        name: 'master.operationalPhotoType.update',
        component: page('Master/OperationalPhotoType/Update'),
        beforeEnter: middleware(appMiddleware),
    },
]