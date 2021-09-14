import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            form: {
                data: {
                    'employee_assignment_id': null,
                    'job_title_id': null,
                    'start_date': null,
                    'end_date': null,
                    'description': '',
                    'note': '',

                    'employee_assignment': {
                        'employee': {},
                        'branch': {},
                    },
                    'job_title': {},
                },
                errors: {
                    'job_title_id': [],
                    'start_date': [],
                    'end_date': [],
                    'description': [],
                    'note': [],
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
                'employee_assignment': {
                    'employee': {},
                    'branch': {},
                },
                'job_titles': [],
            },
        }
    },
    methods: {
        getFormDataCallback() {
            return (data) => {
                return {
                    'id': data['id'],
                    'employee_assignment_id': data['employee_assignment']['id'],
                    'job_title_id': data['job_title']['id'],
                    'start_date': data['start_date'],
                    'end_date': data['end_date'],
                    'admitted': data['admitted'],
                    'description': data['description'],
                    'note': data['note'],

                    'employee_assignment': data['employee_assignment'],
                    'job_title': data['job_title'],
                }
            }
        },
    },
}