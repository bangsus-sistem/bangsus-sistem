import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            form: {
                data: {
                    'branch_id': '',
                    'operational_photo_type_id': '',
                    'image_id': '',
                    'total': '',
                    'description': '',
                    'note': '',

                    'branch': {},
                    'operational_photo_type': {},
                    'image': {},
                },
                errors: {
                    'branch_id': [],
                    'operational_photo_type_id': [],
                    'image_id': [],
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
                'operational_photo_types': [],
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
                    'operational_photo_type_id': data['operational_photo_type']['id'],
                    'image_id': data['image']['id'],
                    'total': data['total'],
                    'description': data['description'],
                    'note': data['note'],

                    'branch': data['branch'],
                    'operational_photo_type': data['operational_photo_type'],
                    'image': data['image'],
                }
            }
        }
    },
}