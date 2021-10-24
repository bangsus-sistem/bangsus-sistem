import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            query: {
                'code': '',
                'name': '',
                'active': ''
            },
            meta: {
                sortOrders: [
                    { index: 'code', title: 'Kode' },
                    { index: 'name', title: 'Nama' },
                    { title: 'Jumlah', sort: false },
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
            return axios.get(
                '/ajax/master/operational_photo_penalty_type',
                { params: { 'operational_photo_type_id': this.$route.params.operationalPhotoTypeId, ...this.query } }
            )
        },
    }
}