import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'branch_type',
        name: 'system.branchType',
        component: page('System/BranchType/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'branch_type/create',
        name: 'system.branchType.create',
        component: page('System/BranchType/Create'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'branch_type/read/:id',
        name: 'system.branchType.read',
        component: page('System/BranchType/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'branch_type/update/:id',
        name: 'system.branchType.update',
        component: page('System/BranchType/Update'),
        beforeEnter: middleware(appMiddleware),
    },
]