import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'operational_photo_type/:operationalPhotoTypeId/operational_photo_penalty_type',
        name: 'master.operationalPhotoPenaltyType',
        component: page('Master/OperationalPhotoPenaltyType/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'operational_photo_type/:operationalPhotoTypeId/operational_photo_penalty_type/create',
        name: 'master.operationalPhotoPenaltyType.create',
        component: page('Master/OperationalPhotoPenaltyType/Create'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'operational_photo_type/:operationalPhotoTypeId/operational_photo_penalty_type/read/:id',
        name: 'master.operationalPhotoPenaltyType.read',
        component: page('Master/OperationalPhotoPenaltyType/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'operational_photo_type/:operationalPhotoTypeId/operational_photo_penalty_type/update/:id',
        name: 'master.operationalPhotoPenaltyType.update',
        component: page('Master/OperationalPhotoPenaltyType/Update'),
        beforeEnter: middleware(appMiddleware),
    },
]