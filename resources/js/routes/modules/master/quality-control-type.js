import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'quality_control_type',
        name: 'master.qualityControlType',
        component: page('Master/QualityControlType/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    // {
    //     path: 'quality_control_type/create',
    //     name: 'master.qualityControlType.create',
    //     component: page('Master/QualityControlType/Create'),
    //     beforeEnter: middleware(appMiddleware),
    // },
    // {
    //     path: 'quality_control_type/read/:id',
    //     name: 'master.qualityControlType.read',
    //     component: page('Master/QualityControlType/Read'),
    //     beforeEnter: middleware(appMiddleware),
    // },
    // {
    //     path: 'quality_control_type/update/:id',
    //     name: 'master.qualityControlType.update',
    //     component: page('Master/QualityControlType/Update'),
    //     beforeEnter: middleware(appMiddleware),
    // },
]