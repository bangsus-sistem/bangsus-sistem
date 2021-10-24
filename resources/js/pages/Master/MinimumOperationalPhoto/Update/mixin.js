import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            form: {
                data: {
                    'operational_photo_type_id': this.$route.params.operationalPhotoTypeId,
                    'minimum': [],
                },
                errors: {
                    'minimum': [],
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
            }
        }
    },
    created() {
        this.fetchAndSetFormData(
            '/ajax/master/operational_photo_type/' + this.$route.params.operationalPhotoTypeId,
            { resolve: true, reject: false },
            { startLoading: true, stopLoading: false },
            this.getFormDataCallback()
        )
            .then(res => {
                this.fetchAndSetMultipleResources(
                    {
                        'branches': '/ajax/system/branch/all',
                    },
                    { resolve: false, reject: false },
                    { startLoading: false, stopLoading: true }
                )
            })
    },
    methods: {
        getFormDataCallback() {
            return (data) => {
                return {
                    'operational_photo_type_id': this.$route.params.operationalPhotoTypeId,
                    'minimum': data['minimum_operational_photos']
                }
            }
        },
        findBranch(id) {
            let branch = lodash.find(this.resources['branches'], (branch) => branch['id'] == id)

            return branch['code'] + ' - ' + branch['name']
        }
    },
}