import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            query: {
                'code': '',
                'nik': '',
                'full_name': '',
                'gender_id': '',
                'admitted': '',
            },
            meta: {
                sortOrders: [
                    { index: 'code', title: 'NIP' },
                    { index: 'nik', title: 'NIK' },
                    { index: 'full_name', title: 'Nama Lengkap' },
                    { index: 'gender_id', title: 'Jenis Kelamin' },
                    { index: 'admitted', title: 'Admisi' },
                ],
            },
            resources: {
                'genders': [],
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
                    'genders': '/ajax/hrm/gender/all'
                },
                { resolve: true, reject: false },
                { startLoading: true, stopLoading: false }
            )
                .then(res => {
                    this.setQuery({
                        'code': [''],
                        'nik': [''],
                        'full_name': [''],
                        'gender_id': ['*', ['*', ...lodash.map(this.resources['genders'], (val) => val.id)]],
                        'admitted': ['*', ['*', true, false, 'true', 'false']],
                    })
                    this.getAndSetResult()
                })
        },
        search() {
            this.startResultLoading()
            this.getAndSetResult(true, 'result')
        },
        fetchResult() {
            return axios.get('/ajax/hrm/employee', { params: this.query })
        },
    }
}