import authenticationLog from './log/authentication-log'
import activityLog from './log/activity-log'

export default [
    ...authenticationLog,
    ...activityLog,
];
