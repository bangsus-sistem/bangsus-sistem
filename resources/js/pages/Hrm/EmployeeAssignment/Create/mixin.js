import commonMixin from '../common/mixin'

export default {
    mixins: [commonMixin],
    created() {
        this.fetchAndSetMultipleResources({
            'branches': '/ajax/system/branch/all',
            'job_titles': '/ajax/hrm/job_title/all',
            'employee': '/ajax/hrm/employee/' + this.$route.params.employeeId,
        }, { resolve: true, reject: false })
            .then(res => {
                this.form.data['employee_id'] = this.$route.params.employeeId
            })
    },
}