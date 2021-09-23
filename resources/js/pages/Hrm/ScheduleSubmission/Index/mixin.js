import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            query: {
                'nip': '',
                'full_name': '',
                'branch_id': '',
                'schedule_date': '',
                'attendance_type_id': '',
                'admitted': '',
            },
            meta: {
                sortOrders: [
                    { index: 'nip', title: 'NIP' },
                    { index: 'full_name', title: 'Nama Karyawan' },
                    { index: 'branch_id', title: 'Cabang' },
                    { index: 'schedule_date', title: 'Tanggal Absensi', sortable: false },
                    { index: 'attendance_type_id', title: 'Tipe Absensi' },
                    { index: 'schedule_in_datetime', title: 'Jadwal Masuk' },
                    { index: 'schedule_out_datetime', title: 'Jadwal Keluar' },
                    { index: 'admit', title: 'Admisi' },
                ],
            },
            resources: {
                'branches': [],
                'attendance_types': [],
            }
        }
    },
    created() {
        this.prepare()
    },
    methods: {
        prepare() {
            this.fetchAndSetMultipleResources({
                'branches': '/ajax/system/branch/all',
                'attendance_types': '/ajax/hrm/attendance_type/all'
            }, { resolve: true, reject: false }, { startLoading: true, stopLoading: false })
            this.setQuery({
                'branch_id': ['*', ['*', ...lodash.map(this.resources['branches'], (val) => val.id)]],
                'schedule_date': [moment().format('YYYY-MM-DD'), '*', (val) => moment(val).format('YYYY-MM-DD')],
                'attendance_type_id': ['*', ['*', ...lodash.map(this.resources['attendance_types'], (val) => val.id)]],
                'admitted': ['*', ['*', true, false, 'true', 'false']],
            })
            this.getAndSetResult()
        },
        search() {
            this.startResultLoading()
            this.getAndSetResult(true, 'result')
        },
        fetchResult() {
            return axios.get('/ajax/hrm/attendance', { params: this.query })
        },
    }
}