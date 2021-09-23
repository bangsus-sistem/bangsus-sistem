import commonMixin from '../common/mixin'

export default {
    mixins: [commonMixin],
    created() {
        this.fetchAndSetFormData(
            '/ajax/hrm/attendance/' + this.$route.params.id,
            { resolve: true, reject: false },
            { startLoading: true, stopLoading: false },
            this.getFormDataCallback()
        )
            .then(res => {
                this.fetchAndSetMultipleResources({
                    'branches': '/ajax/system/branch/all',
                    'attendance_types': '/ajax/hrm/attendance_type/all',
                }, { resolve: false, reject: false })
                this.form.data['schedule_in_datetime'] = this.isoDatetime(this.form.data['schedule_in_datetime'])
                this.form.data['schedule_out_datetime'] = this.isoDatetime(this.form.data['schedule_out_datetime'])
            })
    },
}