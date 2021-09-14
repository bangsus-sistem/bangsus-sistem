import commonMixin from '../common/mixin'

export default {
    mixins: [commonMixin],
    created() {
        this.fetchAndSetMultipleResources({
            'job_titles': '/ajax/hrm/job_title/all',
            'employee_assignment': '/ajax/hrm/employee_assignment/' + this.$route.params.employeeAssignmentId,
        }, { resolve: true, reject: false })
            .then(res => {
                this.form.data['employee_assignment_id'] = this.$route.params.employeeAssignmentId
            })
    },
}