import commonMixin from '../common/mixin'

export default {
    mixins: [commonMixin],
    created() {
        this.fetchAndSetMultipleResources({
            'branches': '/ajax/system/branch/all',
            'attendance_types': '/ajax/hrm/attendance_type/all',
        }, { resolve: true, reject: false })
            .then(res => {
                this.getLocation()
            })
    },
    methods: {
        getLocation() {
            if (navigator.geolocation)
                navigator.geolocation.getCurrentPosition(pos => {
                    console.log(pos)
                    this.state.form.submittable = true
                    this.form.data['position'] = {
                        'latitude': pos.coords.latitude,
                        'longitude': pos.coords.longitude,
                    }
                    this.state.form.located = true
                }, e => {}, { enableHighAccuracy: true, maximumAge: 2000, timeout: 5000 })
        },
        submit() {
            if (this.state.form.submittable)
                this.submitForm('/ajax/hrm/attendance/attendance', 'post', {
                    resolve: true,
                    reject: false
                }).then(res => {
                    this.resources['attendance'] = res.data
                    this.state.form.submitted = true
                })
        },
        repopulate() {
            this.state.form.submittable = false
            this.state.form.submitted = false
            this.form.data = {
                'employee_id': '',
                'branch_id': '',
                'attendance_type_id': '',
                'image_id': '',
                'image_in_id': '',
                'image_out_id': '',
                'schedule_in_datetime': '',
                'schedule_out_datetime': '',
                'attendance_in_datetime': '',
                'attendance_out_datetime': '',
                'datetime': '',
                'position': {
                    'latitude': '',
                    'longitude': '',
                },

                'employee': [],
                'branch': [],
                'attendance_type': [],
                'image_in': [],
                'image_out': [],
            }
            this.getLocation()
        },
    }
}