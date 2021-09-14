import commonMixin from '../common/mixin'

export default {
    mixins: [commonMixin],
    created() {
        this.fetchAndSetFormData(
            '/ajax/hrm/employee_assignment/' + this.$route.params.id,
            { resolve: true, reject: false },
            { startLoading: true, stopLoading: false },
            this.getFormDataCallback()
        )
            .then(res => {
                this.fetchAndSetMultipleResources(
                    {
                        'branches': '/ajax/system/branch/all',
                        'job_titles': '/ajax/hrm/job_title/all',
                    },
                    { resolve: false, reject: false },
                    { startLoading: false, stopLoading: true }
                )
            })
    },
}