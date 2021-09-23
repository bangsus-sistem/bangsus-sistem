import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'schedule_submission',
        name: 'hrm.scheduleSubmission',
        component: page('Hrm/ScheduleSubmission/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'schedule_submission/create',
        name: 'hrm.scheduleSubmission.create',
        component: page('Hrm/ScheduleSubmission/Create'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'schedule_submission/read/:id',
        name: 'hrm.scheduleSubmission.read',
        component: page('Hrm/ScheduleSubmission/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'schedule_submission/update/:id',
        name: 'hrm.scheduleSubmission.update',
        component: page('Hrm/ScheduleSubmission/Update'),
        beforeEnter: middleware(appMiddleware),
    },
]