import mixins from '../../EmployeeAssignment/common/mixin'

export default {
    mixins: [mixins],
    data() {
        return {
            query: {
                'job_title_id': '',
                'start_date': '',
                'end_date': '',
                'admitted': '',
            },
            meta: {
                sortOrders: [
                    { index: 'job_title_id', title: 'Jabatan' },
                    { index: 'start_date', title: 'Tanggal Mulai' },
                    { index: 'end_date', title: 'Tanggal Selesai' },
                    { index: 'admitted', title: 'Admisi' },
                ],
            },
            resources: {
                'job_titles': [],
            },
        }
    },
    created() {
        this.prepare()
    },
    methods: {
        prepare() {
            this.fetchAndSetFormData(
                '/ajax/hrm/employee_assignment/' + this.$route.params.employeeAssignmentId,
                { resolve: true, reject: false },
                { startLoading: true, stopLoading: false },
                this.getFormDataCallback()
            )
                .then(res => {
                    this.fetchAndSetMultipleResources(
                        {
                            'job_titles': '/ajax/hrm/job_title/all',
                        },
                        { resolve: true, reject: false },
                        { startLoading: false, stopLoading: false }
                    )
                        .then(res => {
                            this.setQuery({
                                'job_title_id': ['*', ['*', ...lodash.map(this.resources['job_titles'], (val) => val.id)]],
                                'start_date': [''],
                                'end_date': [''],
                                'admitted': ['*', ['*', true, false, 'true', 'false']],
                            })
                            this.getAndSetResult()
                        })
                })
            
        },
        search() {
            this.startResultLoading()
            this.getAndSetResult(true, 'result')
        },
        fetchResult() {
            return axios.get('/ajax/hrm/employee_mutation', { params: { 'employee_assignment_id': this.$route.params.employeeAssignmentId, ...this.query} })
        },
    }
}