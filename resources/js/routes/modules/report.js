import page from '../page'
import middleware from '../middleware'
import appMiddleware from '../middleware/app-middleware'

export default [
    {
        path: '',
        name: 'report',
        component: page('Report'),
        beforeEnter: middleware(appMiddleware),
    }
]