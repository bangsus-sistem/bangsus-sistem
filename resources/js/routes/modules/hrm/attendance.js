import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'attendance',
        name: 'hrm.attendance',
        component: page('Hrm/Attendance/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'attendance/create',
        name: 'hrm.attendance.create',
        component: page('Hrm/Attendance/Create'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'attendance/read/:id',
        name: 'hrm.attendance.read',
        component: page('Hrm/Attendance/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'attendance/update/:id',
        name: 'hrm.attendance.update',
        component: page('Hrm/Attendance/Update'),
        beforeEnter: middleware(appMiddleware),
    },
]