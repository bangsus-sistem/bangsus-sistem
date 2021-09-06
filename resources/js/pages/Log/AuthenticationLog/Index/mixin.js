import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            query: {
                'user_id': '',
                'state': '',
            },
            result: {
                items: [],
            },
            meta: {
                sortOrders: [
                    { index: 'user_id', title: 'User' },
                    { index: 'created_at', title: 'Waktu' },
                    { index: 'state', title: 'Status' },
                ],
            },
            resources: {
                'users': [],
            },
        }
    },
    created() {
        this.prepare()
    },
    methods: {
        prepare() {
            this.fetchAndSetMultipleResources({
                'users': '/ajax/auth/user/all'
            }, { resolve: true, reject: false }, { startLoading: true, stopLoading: false })
                .then(res => {
                    this.setQuery({
                        'user_id': ['*', ['*', ...lodash.map(this.resources['users'], (val) => val.id)]],
                        'state': ['*', ['*', true, false, 'true', 'false']],
                    })
                    this.getAndSetResult()
                })
        },
        search() {
            this.startResultLoading()
            this.getAndSetResult(true, 'result')
        },
        fetchResult() {
            return axios.get('/ajax/log/authentication_log', { params: this.query })
        },
    }
}