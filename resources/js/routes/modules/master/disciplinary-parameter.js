import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'disciplinary_parameter',
        name: 'master.disciplinaryParameter',
        component: page('Master/DisciplinaryParameter/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'disciplinary_parameter/create',
        name: 'master.disciplinaryParameter.create',
        component: page('Master/DisciplinaryParameter/Create'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'disciplinary_parameter/read/:id',
        name: 'master.disciplinaryParameter.read',
        component: page('Master/DisciplinaryParameter/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'disciplinary_parameter/update/:id',
        name: 'master.disciplinaryParameter.update',
        component: page('Master/DisciplinaryParameter/Update'),
        beforeEnter: middleware(appMiddleware),
    },
]