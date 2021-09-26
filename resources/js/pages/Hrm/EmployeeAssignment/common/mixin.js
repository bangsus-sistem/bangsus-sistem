import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            form: {
                data: {
                    'employee_id': null,
                    'branch_id': null,
                    'first_job_title_id': null,
                    'start_date': null,
                    'end_date': null,
                    'base_salary': 0,
                    'description': '',
                    'note': '',

                    'employee': {},
                    'branch': {},
                    'first_job_title': {},
                },
                errors: {
                    'employee_id': [],
                    'branch_id': [],
                    'first_job_title_id': [],
                    'start_date': [],
                    'end_date': [],
                    'base_salary': [],
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
                'employee': {},
                'branches': [],
                'job_titles': [],
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
                    'first_job_title_id': data['first_job_title']['id'],
                    'start_date': data['start_date'],
                    'end_date': data['end_date'],
                    'base_salary': data['base_salary'],
                    'admitted': data['admitted'],
                    'description': data['description'],
                    'note': data['note'],

                    'employee': data['employee'],
                    'branch': data['branch'],
                    'first_job_title': data['first_job_title'],
                }
            }
        },
    },
}