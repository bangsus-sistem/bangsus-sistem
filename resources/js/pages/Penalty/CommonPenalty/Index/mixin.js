import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            query: {
                'code': '',
                'transaction_date': '',
                'month': '',
                'branch_id': '',
            },
            meta: {
                sortOrders: [
                    { index: 'code', title: 'Kode' },
                    { index: 'transaction_date', title: 'Tanggal Transaksi' },
                    { index: 'branch_id', title: 'Cabang' },
                    { index: 'month', title: 'Bulan' },
                    { title: 'Total', sort: false },
                ],
            },
            resources: {
                'branches': [],
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
                    'branches': '/ajax/system/branch/all'
                },
                { resolve: true, reject: false },
                { startLoading: true, stopLoading: false }
            )
                .then(res => {
                    this.setQuery({
                        'code': [''],
                        'transaction_date': [''],
                        'month': [''],
                        'branch_id': ['*', ['*', ...lodash.map(this.resources['branches'], (val) => val.id)]],
                    })
                    this.getAndSetResult()
                })
        },
        search() {
            this.startResultLoading()
            this.getAndSetResult(true, 'result')
        },
        fetchResult() {
            return axios.get('/ajax/penalty/common_penalty', { params: this.query })
        },
    }
}