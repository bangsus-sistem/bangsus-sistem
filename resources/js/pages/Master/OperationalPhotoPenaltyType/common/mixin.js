import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            form: {
                data: {
                    'code': '',
                    'name': '',
                    'amount': 0,
                    'operational_photo_type_id': this.$route.params.operationalPhotoTypeId,
                    'description': '',
                    'note': '',
                },
                errors: {
                    'code': [],
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
                    'code': data['code'],
                    'name': data['name'],
                    'amount': data['amount'],
                    'operational_photo_type_id': data['operational_photo_type']['id'],
                    'active': data['active'],
                    'description': data['description'],
                    'note': data['note'],

                    'operational_photo_type': data['operational_photo_type'],
                }
            }
        }
    },
}