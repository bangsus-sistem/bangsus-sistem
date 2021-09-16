import commonMixin from '../common/mixin'

export default {
    mixins: [commonMixin],
    created() {
        this.fetchAndSetMultipleResources({
            'branches': '/ajax/system/branch/all',
            'attendance_types': '/ajax/hrm/attendance_type/all',
        }, { resolve: false, reject: false })
    },
}