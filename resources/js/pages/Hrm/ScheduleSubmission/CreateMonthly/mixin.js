import commonMixin from '../common/mixin'

export default {
    mixins: [commonMixin],
    data() {
        return {
            form: {
                data: {
                    'employee_ids': [],
                    'branch_id': '',
                    'attendance_type_id': '',
                    'start_date': '',
                    'end_date': '',
                    'schedule_submissions': [
                        [], []
                    ]
                },
                errors: {
                    'employee_ids': [],
                    'branch_id': [],
                    'attendance_type_id': [],
                    'start_date': [],
                    'end_date': [],
                    'schedule_submissions': []
                }
            },
        }
    },
    created() {
        this.fetchAndSetMultipleResources({
            'branches': '/ajax/system/branch/all',
            'attendance_types': '/ajax/hrm/attendance_type/all',
        }, { resolve: false, reject: false })
    },
    watch: {
        'form.data.branch_id': function (ne, ol) {
            this.state.form.table.loading = true
            this.fetchAndSetMultipleResources({
                'employees': '/ajax/hrm/employee/all_by_branch_assignment?branch_id='+ne,
            }, { resolve: true, reject: false }, { startLoading: false, stopLoading: false })
                .then(res => {
                    this.rearrangeScheduleSubmissions()
                    this.rearrangeEmployeeIds()
                    this.state.form.table.loading = false
                })
        },
        'form.data.start_date': function () {
            this.rearrangeDates()
        },
        'form.data.end_date': function () {
            this.rearrangeDates()
        },
    },
    methods: {
        rearrangeDates() {
            if (this.form.data['start_date'] == null || this.form.data['start_date'] == '') {
                return
            }
            if (this.form.data['end_date'] == null || this.form.data['end_date'] == '') {
                return
            }

            let startDate = moment(this.form.data['start_date'])
            let endDate = moment(this.form.data['end_date'])

            this.state.form.dates = []

            // Validate if the end_date is before start_date
            if (startDate.isAfter(endDate)) {
                this.form.errors['end_date'] = ['Tanggal Akhir harus sesudah Tanggal Awal']
                return
            } else {
                this.form.errors['end_date'] = []
            }

            let date = moment(this.form.data['start_date'])
            while (true) {
                if (endDate.format('YYYY-MM-DD') == date.format('YYYY-MM-DD')) {
                    this.state.form.dates.push(date.format('YYYY-MM-DD'))
                    break
                }

                this.state.form.dates.push(date.format('YYYY-MM-DD'))
                date.add(1, 'days')
            }

            this.rearrangeScheduleSubmissions()
        },
        rearrangeScheduleSubmissions() {
            this.form.data['schedule_submissions'] = []

            let data = []
            this.resources['employees'].forEach(employee => {
                let dt = {}
                this.state.form.dates.forEach(date => {
                    dt[date] = ''
                })
                data[employee['id']] = dt
            })
            this.form.data['schedule_submissions'] = data
        },
        rearrangeEmployeeIds() {
            this.form.data['employee_ids'] = []
            this.resources['employees'].forEach(employee => {
                this.form.data['employee_ids'].push(employee['id'])
                this.$set(this.state.form.table.show, employee['id'], true)
            })
        },
        toggleEmployeeSchedules(id) {
            this.$set(this.state.form.table.show, id, ! this.state.form.table.show[id])
        }
    }
}