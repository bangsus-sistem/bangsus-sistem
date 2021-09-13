import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            form: {
                data: {
                    'name': '',
                    'description': '',
                    'note': '',
                },
                errors: {
                    'name': [],
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
                    'name': data['name'],
                    'active': data['active'],
                    'description': data['description'],
                    'note': data['note'],
                }
            }
        }
    },
}