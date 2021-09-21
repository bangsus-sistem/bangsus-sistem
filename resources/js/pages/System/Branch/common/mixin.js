import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            form: {
                data: {
                    'code': '',
                    'name': '',
                    'branch_type_id': '',
                    'description': '',
                    'note': '',
                },
                errors: {
                    'code': [],
                    'name': [],
                    'branch_type_id': [],
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
                    'branch_type_id': data['branch_type']['id'],
                    'active': data['active'],
                    'description': data['description'],
                    'note': data['note'],
                }
            }
        }
    },
}