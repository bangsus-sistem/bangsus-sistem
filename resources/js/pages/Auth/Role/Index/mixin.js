import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            query: {
                'code': '',
                'name': '',
                'active': '',
                'all_features': '',
                'all_widgets': '',
                'all_reports': '',
            },
            meta: {
                sortOrders: [
                    { index: 'code', title: 'Kode' },
                    { index: 'name', title: 'Nama' },
                    { index: 'active', title: 'Status' },
                    { index: 'all_features', title: 'Fitur' },
                    { index: 'all_widgets', title: 'Widget' },
                    { index: 'all_reports', title: 'Laporan' },
                ],
            },
        }
    },
    created() {
        this.prepare()
    },
    methods: {
        prepare() {
            this.setQuery({
                'code': [''],
                'name': [''],
                'active': [true, ['*', true, false, 'true', 'false']],
                'all_features': ['*', ['*', true, false, 'true', 'false']],
                'all_widgets': ['*', ['*', true, false, 'true', 'false']],
                'all_reports': ['*', ['*', true, false, 'true', 'false']],
            })
            this.getAndSetResult()
        },
        search() {
            this.startResultLoading()
            this.getAndSetResult(true, 'result')
        },
        fetchResult() {
            return axios.get('/ajax/auth/role', { params: this.query })
        },
    }
}