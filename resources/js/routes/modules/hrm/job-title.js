import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'job_title',
        name: 'hrm.jobTitle',
        component: page('Hrm/JobTitle/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'job_title/create',
        name: 'hrm.jobTitle.create',
        component: page('Hrm/JobTitle/Create'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'job_title/read/:id',
        name: 'hrm.jobTitle.read',
        component: page('Hrm/JobTitle/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'job_title/update/:id',
        name: 'hrm.jobTitle.update',
        component: page('Hrm/JobTitle/Update'),
        beforeEnter: middleware(appMiddleware),
    },
]