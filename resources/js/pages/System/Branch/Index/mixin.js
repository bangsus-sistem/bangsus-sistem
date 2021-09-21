import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            query: {
                'code': '',
                'name': '',
                'branch_type_id': '',
                'active': '',
            },
            meta: {
                sortOrders: [
                    { index: 'code', title: 'Kode' },
                    { index: 'name', title: 'Nama' },
                    { index: 'branch_type_id', title: 'Divisi' },
                    { index: 'active', title: 'Status' },
                ],
            },
            resources: {
                'branch_types': [],
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
                    'branch_types': '/ajax/hrm/branch_type/all'
                },
                { resolve: true, reject: false },
                { startLoading: true, stopLoading: false }
            )
                .then(res => {
                    this.setQuery({
                        'code': [''],
                        'name': [''],
                        'branch_type_id': ['*', ['*', ...lodash.map(this.resources['branch_types'], (val) => val.id)]],
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
            return axios.get('/ajax/system/branch', { params: this.query })
        },
    }
}