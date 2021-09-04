import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            query: {
                'user_id': '',
                'activity_log_type': '',
            },
            result: {
                items: [],
            },
            meta: {
                sortOrders: [
                    { index: 'user_id', title: 'User' },
                    { index: 'created_at', title: 'Waktu' },
                    { index: 'activity_log_type', title: 'Tipe' },
                    { title: 'Akses', sortable: false },
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
                        'activity_log_type': ['*', ['*', 'feature', 'widget', 'report']],
                    })
                    this.getAndSetResult()
                })
        },
        search() {
            this.startResultLoading()
            this.getAndSetResult(true, 'result')
        },
        fetchResult() {
            return axios.get('/ajax/log/activity_log', { params: this.query })
        },
    }
}