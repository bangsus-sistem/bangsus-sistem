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
        path: 'schedule_submission/create_monthly',
        name: 'hrm.scheduleSubmission.createMonthly',
        component: page('Hrm/ScheduleSubmission/CreateMonthly'),
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
    {
        path: 'schedule_submission/admit_monthly',
        name: 'hrm.scheduleSubmission.admitMonthly',
        component: page('Hrm/ScheduleSubmission/AdmitMonthly'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'schedule_submission/admit_all',
        name: 'hrm.scheduleSubmission.admitAll',
        component: page('Hrm/ScheduleSubmission/AdmitAll'),
        beforeEnter: middleware(appMiddleware),
    },
]