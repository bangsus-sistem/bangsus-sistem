import commonMixin from '../common/mixin'

export default {
    mixins: [commonMixin],
    data() {
        return {
            query: {
                'job_title': {
                    'code': '',
                    'name': '',
                    'active': '',
                    'order': '',
                    'sort': '',
                },
            },
            meta: {
                'job_title': {
                    sortOrders: [
                        { index: 'code', title: 'Kode' },
                        { index: 'name', title: 'Nama' },
                        { index: 'active', title: 'Status' },
                    ],
                    counts: [10, 25, 50, 100],
                    show: true,
                },
            },
            result: {
                'job_title': {
                    items: [],
                    meta: {}
                },
            },
            state: {
                result: {
                    'job_title': { loading: false },
                }
            }
        }
    },
    created() {
        this.fetchAndSetFormData(
            '/ajax/hrm/division/' + this.$route.params.id,
            { resolve: true, reject: false },
            { startLoading: true, stopLoading: true },
            this.getFormDataCallback()
        )
        .then(res => {
            this.prepare()
        })
    },
    methods: {
        prepare() {
            this.prepareJobTitle()
        },
        prepareJobTitle() {
            this.setQuery({
                'code': [''],
                'name': [''],
                'active': [true, ['*', true, false, 'true', 'false']],
            }, 'job_title')
            this.getAndSetResult(true, 'page', 'job_title')
        },
        fetchResult(index) {
            return axios.get('/ajax/hrm/' + index, {
                params: {
                    'division_id': this.$route.params.id,
                    ...this.query[index],
                }
            })
        },
    }
}