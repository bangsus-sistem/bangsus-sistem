import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            form: {
                data: {
                    'employee_id': '',
                    'branch_id': '',
                    'attendance_type_id': '',
                    'image_id': '',
                    'schedule_in_datetime': '',
                    'schedule_out_datetime': '',
                    'attendance_in_datetime': '',
                    'attendance_out_datetime': '',
                    'datetime': '',

                    'employee': [],
                    'branch': [],
                    'attendance_type': [],
                    'image': [],
                },
                errors: {
                    'employee_id': [],
                    'branch_id': [],
                    'attendance_type_id': [],
                    'image_id': [],
                    'schedule_in_datetime': [],
                    'schedule_out_datetime': [],
                    'attendance_in_datetime': [],
                    'attendance_out_datetime': [],
                    'datetime': [],
                },
            },
            state: {
                page: {
                    loading: false,
                    error: false,
                    message: null,
                },
                result: { loading: false },
                form: { loading: false },
            },
            resources: {
                'branches': [],
                'employees': [],
                'attendance_types': [],
            },
        }
    },
    methods: {
        getFormDataCallback() {
            return (data) => {
                return {
                    'id': data['id'],
                    'employee_id': data['employee']['id'],
                    'branch_id': data['branch']['id'],
                    'attendance_type_id': data['attendance_type']['id'],
                    'image_id': data['image'] != null ? data['image']['id'] : null,
                    'schedule_in_datetime': data['schedule_in_datetime'],
                    'schedule_out_datetime': data['schedule_out_datetime'],
                    'attendance_in_datetime': data['attendance_in_datetime'],
                    'attendance_out_datetime': data['attendance_out_datetime'],
                    'datetime': data['datetime'],
                    
                    'employee': data['employee'],
                    'branch': data['branch'],
                    'attendance_type': data['attendance_type'],
                    'image': data['image'],
                }
            }
        }
    },
    watch: {
        'form.data.branch_id': function (ne, ol) {
            this.fetchAndSetMultipleResources({
                'employees': '/ajax/hrm/employee/all_by_branch_assignment?branch_id='+ne,
            }, { resolve: false, reject: false }, { startLoading: false, stopLoading: false })
        }
    }
}