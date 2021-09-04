import _package from './system/package'
import _module from './system/module'
import action from './system/action';
import feature from './system/feature';
import widget from './system/widget';
import report from './system/report';
import role from './system/role';
import user from './system/user';
import branchType from './system/branch-type'
import branch from './system/branch'

export default [
    ..._package,
    ..._module,
    ...action,
    ...feature,
    ...widget,
    ...report,
    ...role,
    ...user,
    ...branchType,
    ...branch,
];
