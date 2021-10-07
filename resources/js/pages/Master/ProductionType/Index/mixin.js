import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            query: {
                'code': '',
                'name': '',
                'active': '',
            },
            meta: {
                sortOrders: [
                    { index: 'code', title: 'Kode' },
                    { index: 'name', title: 'Nama' },
                    { index: 'active', title: 'Status' },
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
            })
            this.getAndSetResult()
        },
        search() {
            this.startResultLoading()
            this.getAndSetResult(true, 'result')
        },
        fetchResult() {
            return axios.get('/ajax/master/production_type', { params: this.query })
        },
    }
}