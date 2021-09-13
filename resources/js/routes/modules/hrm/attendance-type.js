import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'attendance_type',
        name: 'hrm.attendanceType',
        component: page('Hrm/AttendanceType/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'attendance_type/create',
        name: 'hrm.attendanceType.create',
        component: page('Hrm/AttendanceType/Create'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'attendance_type/read/:id',
        name: 'hrm.attendanceType.read',
        component: page('Hrm/AttendanceType/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'attendance_type/update/:id',
        name: 'hrm.attendanceType.update',
        component: page('Hrm/AttendanceType/Update'),
        beforeEnter: middleware(appMiddleware),
    },
]