import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            form: {
                data: {
                    'code': '',
                    'name': '',
                    'disciplinary_values': [
                        {
                            'name': '',
                            'expected_value' :'',
                        },
                    ],
                    'description': '',
                    'note': '',
                },
                errors: {
                    'code': [],
                    'name': [],
                    'disciplinary_values': [
                        {
                            'name': [],
                            'expected_value' :[],
                        },
                    ],
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
        }
    },
    methods: {
        getFormDataCallback() {
            return (data) => {
                return {
                    'id': data['id'],
                    'code': data['code'],
                    'name': data['name'],
                    'active': data['active'],
                    'disciplinary_values': data['disciplinary_values'],
                    'description': data['description'],
                    'note': data['note'],
                }
            }
        },
    },
}