import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            query: {
                'name': '',
                'active': '',
            },
            meta: {
                sortOrders: [
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
            return axios.get('/ajax/hrm/blood_type', { params: this.query })
        },
    }
}