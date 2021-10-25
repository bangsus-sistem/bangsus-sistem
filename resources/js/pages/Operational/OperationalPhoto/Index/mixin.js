import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            query: {
                'code': '',
                'transaction_date': '',
                'branch_id': '',
                'operational_photo_type_id': '',
            },
            meta: {
                sortOrders: [
                    { index: 'code', title: 'Kode' },
                    { index: 'transaction_date', title: 'Tanggal Transaksi' },
                    { index: 'branch_id', title: 'Cabang' },
                    { index: 'operational_photo_type_id', title: 'Tipe Foto Operasional' },
                ],
            },
            resources: {
                'branches': [],
                'operational_photo_types': [],
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
                    'branches': '/ajax/system/branch/all',
                    'operational_photo_types': '/ajax/master/operational_photo_type/all',
                },
                { resolve: true, reject: false },
                { startLoading: true, stopLoading: false }
            )
                .then(res => {
                    this.setQuery({
                        'code': [''],
                        'transaction_date': [''],
                        'branch_id': ['*', ['*', ...lodash.map(this.resources['branches'], (val) => val.id)]],
                        'operational_photo_type_id': ['*', ['*', ...lodash.map(this.resources['operational_photo_types'], (val) => val.id)]],
                    })
                    this.getAndSetResult()
                })
        },
        search() {
            this.startResultLoading()
            this.getAndSetResult(true, 'result')
        },
        fetchResult() {
            return axios.get('/ajax/operational/operational_photo', { params: this.query })
        },
    }
}