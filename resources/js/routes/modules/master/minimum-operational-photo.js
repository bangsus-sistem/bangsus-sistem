import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'operational_photo_type/:operationalPhotoTypeId/minimum_operational_photo',
        name: 'master.minimumOperationalPhoto',
        component: page('Master/MinimumOperationalPhoto/Update'),
        beforeEnter: middleware(appMiddleware),
    },
]