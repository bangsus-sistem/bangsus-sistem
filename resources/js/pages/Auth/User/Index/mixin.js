import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            query: {
                'username': '',
                'full_name': '',
                'role_id': '',
                'active': '',
                'all_branches': '',
            },
            result: {
                items: [],
            },
            meta: {
                sortOrders: [
                    { index: 'username', title: 'Username' },
                    { index: 'full_name', title: 'Nama' },
                    { index: 'role_id', title: 'Role' },
                    { index: 'active', title: 'Status' },
                    { index: 'all_branches', title: 'Cabang' },
                ],
            },
            resources: {
                'roles': [],
            },
        }
    },
    created() {
        this.prepare()
    },
    methods: {
        prepare() {
            this.fetchAndSetMultipleResources({
                'roles': '/ajax/auth/role/all'
            }, { resolve: true, reject: false }, { startLoading: true, stopLoading: false })
                .then(res => {
                    this.setQuery({
                        'username': [''],
                        'full_name': [''],
                        'role_id': ['*', ['*', ...lodash.map(this.resources['roles'], (val) => val.id)]],
                        'active': [true, ['*', true, false, 'true', 'false']],
                        'all_branches': ['*', ['*', true, false, 'true', 'false']],
                    })
                    this.getAndSetResult()
                })
        },
        search() {
            this.startResultLoading()
            this.getAndSetResult(true, 'result')
        },
        fetchResult() {
            return axios.get('/ajax/auth/user', { params: this.query })
        },
    }
}