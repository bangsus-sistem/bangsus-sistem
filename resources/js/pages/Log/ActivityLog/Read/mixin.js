import mixins from '../../../../mixins'
import activityLogTypeMixin from '../common/activity-log-type-mixin'

export default {
    mixins: [mixins, activityLogTypeMixin],
    data() {
        return {
            form: {
                data: {
                    'user': {},
                    'activity_log_type': '',
                    'feature': {},
                    'widget': {},
                    'report': {},
                    'created_at': '',
                },
            },
        }
    },
    created() {
        this.fetchAndSetFormData(
            '/ajax/log/activity_log/' + this.$route.params.id,
            { resolve: false, reject: false },
            { startLoading: true, stopLoading: true },
        )
    },
}