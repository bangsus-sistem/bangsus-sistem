import commonMixin from '../common/mixin'

export default {
    mixins: [commonMixin],
    created() {
        this.fetchAndSetFormData(
            '/ajax/operational/operational_photo/' + this.$route.params.id,
            { resolve: false, reject: false },
            { startLoading: true, stopLoading: true },
            this.getFormDataCallback()
        )
            .then(res => {
                this.fetchAndSetMultipleResources({
                    'branches': '/ajax/system/branch/all',
                    'operational_photo_types': '/ajax/master/operational_photo_type/all',
                }, { resolve: true, reject: false }, { startLoading: false, stopLoading: true })
            })
    },
}