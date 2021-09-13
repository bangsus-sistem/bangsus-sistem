import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            query: {
                'code': '',
                'name': '',
                'division_id': '',
                'active': '',
            },
            meta: {
                sortOrders: [
                    { index: 'code', title: 'Kode' },
                    { index: 'name', title: 'Nama' },
                    { index: 'division_id', title: 'Divisi' },
                    { index: 'active', title: 'Status' },
                ],
            },
            resources: {
                'divisions': [],
            },
        }
    },
    created() {
        this.prepare()
    },
    methods: {
        prepare() {
            this.fetchAndSetMultipleResources(
                {
                    'divisions': '/ajax/hrm/division/all'
                },
                { resolve: true, reject: false },
                { startLoading: true, stopLoading: false }
            )
                .then(res => {
                    this.setQuery({
                        'code': [''],
                        'name': [''],
                        'division_id': ['*', ['*', ...lodash.map(this.resources['divisions'], (val) => val.id)]],
                        'active': [true, ['*', true, false, 'true', 'false']],
                    })
                    this.getAndSetResult()
                })
        },
        search() {
            this.startResultLoading()
            this.getAndSetResult(true, 'result')
        },
        fetchResult() {
            return axios.get('/ajax/hrm/job_title', { params: this.query })
        },
    }
}