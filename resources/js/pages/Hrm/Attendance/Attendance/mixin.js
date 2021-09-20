import commonMixin from '../common/mixin'

export default {
    mixins: [commonMixin],
    created() {
        this.fetchAndSetMultipleResources({
            'branches': '/ajax/system/branch/all',
            'attendance_types': '/ajax/hrm/attendance_type/all',
        }, { resolve: true, reject: false })
            .then(res => {
                // if (navigator.geolocation)
                    navigator.geolocation.getCurrentPosition(pos => {
                        console.log(pos)
                        this.state.form.submittable = true
                        this.form.data['position'] = {
                            'latitude': pos.coords.latitude,
                            'longitude': pos.coords.longitude,
                        }
                    })
            })
    },
    methods: {
        submit() {
            if (this.state.form.submittable)
                this.submitForm('/ajax/hrm/attendance/attendance', 'post', {
                    resolve: true,
                    reject: false
                }).then(() => this.$router.push({ name: 'hrm.attendance' }))
        }
    }
}