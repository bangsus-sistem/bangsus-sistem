import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            form: {
                data: {
                    'username': '',
                    'full_name': '',
                    'password': '',
                    'password_confirmation': '',
                    'role_id': '',
                    'all_branches': false,
                    'branch_ids': [],
                    'description': '',
                    'note': '',

                    'role': [],
                },
                errors: {
                    'username': [],
                    'full_name': [],
                    'password': [],
                    'password_confirmation': [],
                    'role_id': [],
                    'branch_ids': [],
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
                'roles': [],
                'branches': [],
            },
        }
    },
    methods: {
        getFormDataCallback() {
            return (data) => {
                return {
                    'id': data['id'],
                    'username': data['username'],
                    'full_name': data['full_name'],
                    'role_id': data['role']['id'],
                    'active': data['active'],
                    'description': data['description'],
                    'note': data['note'],
                    'all_branches': data['all_branches'],
                    'branch_ids': ! data['all_branches']
                        ?   lodash.chain(data['branches'])
                                .map(branch => branch['id'])
                                .value()
                        :   [],

                    'role': data['role'],
                }
            }
        }
    },
}