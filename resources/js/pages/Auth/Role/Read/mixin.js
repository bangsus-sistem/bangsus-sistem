import commonMixin from '../common/mixin'

export default {
    mixins: [commonMixin],
    data() {
        return {
            query: {
                user: {
                    'username': '',
                    'full_name': '',
                    'active': '',
                    'all_branches': '',
                    'order': '',
                    'sort': '',
                },
            },
            meta: {
                user: {
                    sortOrders: [
                        { index: 'username', title: 'Username' },
                        { index: 'full_name', title: 'Nama' },
                        { index: 'active', title: 'Status' },
                        { index: 'all_branches', title: 'Cabang' },
                    ],
                    counts: [10, 25, 50, 100],
                    show: true,
                },
            },
            result: {
                user: {
                    items: [],
                    meta: {}
                },
            },
            state: {
                result: {
                    user: { loading: false },
                }
            }
        }
    },
    created() {
        this.fetchAndSetFormData(
            '/ajax/auth/role/' + this.$route.params.id,
            { resolve: true, reject: false },
            { startLoading: true, stopLoading: false },
            this.getFormDataCallback()
        )
            .then(res => {
                this.fetchAndSetMultipleResources(
                    {
                        'packages': '/ajax/auth/package/all',
                        'modules': '/ajax/auth/module/all',
                        'actions': '/ajax/auth/action/all',
                        'widgets': '/ajax/auth/widget/all',
                        'reports': '/ajax/auth/report/all',
                        'features': '/ajax/auth/feature/all',
                    },
                    { resolve: true, reject: false },
                    { startLoading: false, stopLoading: true },
                )
                    .then(res => {
                        this.prepare()
                    })
            })
    },
    methods: {
        prepare() {
            this.prepareUser()
        },
        prepareUser() {
            this.setQuery({
                'username': [''],
                'full_name': [''],
                'active': [true, ['*', true, false, 'true', 'false']],
                'all_branches': ['*', ['*', true, false, 'true', 'false']],
            }, 'user')
            this.getAndSetResult(true, 'page', 'user')
        },
        fetchResult(index) {
            return axios.get('/ajax/auth/' + index, {
                params: {
                    'role_id': this.$route.params.id,
                    ...this.query[index],
                }
            })
        },
    }
}