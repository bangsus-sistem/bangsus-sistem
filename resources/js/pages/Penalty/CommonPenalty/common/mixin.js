import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            form: {
                data: {
                    'branch_id': '',
                    'total': '',
                    'description': '',
                    'note': '',

                    'branch': {},
                },
                errors: {
                    'branch_id': [],
                    'total': [],
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
                'branches': [],
            },
        }
    },
    methods: {
        getFormDataCallback() {
            return (data) => {
                return {
                    'id': data['id'],
                    'code': data['code'],
                    'branch_id': data['branch']['id'],
                    'total': data['total'],
                    'description': data['description'],
                    'note': data['note'],

                    'branch': data['branch'],
                }
            }
        }
    },
}