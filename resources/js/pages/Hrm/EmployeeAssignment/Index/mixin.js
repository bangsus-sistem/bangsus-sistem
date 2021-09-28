import mixins from '../../Employee/common/mixin'

export default {
    mixins: [mixins],
    data() {
        return {
            query: {
                'branch_id': '',
                'first_job_title_id': '',
                'start_date': '',
                'end_date': '',
                'admitted': '',
            },
            meta: {
                sortOrders: [
                    { index: 'branch_id', title: 'Cabang' },
                    { index: 'first_job_title_id', title: 'Jabatan Pertama' },
                    { index: 'start_date', title: 'Tanggal Mulai' },
                    { index: 'end_date', title: 'Tanggal Selesai' },
                    { index: 'base_salary', title: 'Gaji Pokok' },
                    { index: 'admitted', title: 'Admisi' },
                ],
            },
            resources: {
                'branches': [],
                'job_titles': [],
            },
        }
    },
    created() {
        this.prepare()
    },
    methods: {
        prepare() {
            const featureAuth = this.$store.getters['utils/auth/features']
            const feature = lodash.find(featureAuth, (feature) => {
                return feature['module']['ref'] == 'employee_assignment' && feature['action']['ref'] == 'admit'
            })
            if (feature == undefined) {
                this.meta.sortOrders.splice(4, 1)
            }

            this.fetchAndSetFormData(
                '/ajax/hrm/employee/' + this.$route.params.employeeId,
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
                        { resolve: true, reject: false },
                        { startLoading: false, stopLoading: false }
                    )
                        .then(res => {
                            this.setQuery({
                                'branch_id': ['*', ['*', ...lodash.map(this.resources['branches'], (val) => val.id)]],
                                'first_job_title_id': ['*', ['*', ...lodash.map(this.resources['job_titles'], (val) => val.id)]],
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
            return axios.get('/ajax/hrm/employee_assignment', { params: { 'employee_id': this.$route.params.employeeId, ...this.query} })
        },
    }
}