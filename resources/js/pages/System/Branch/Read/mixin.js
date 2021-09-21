import commonMixin from '../common/mixin'

export default {
    mixins: [commonMixin],
    created() {
        this.fetchAndSetFormData(
            '/ajax/system/branch/' + this.$route.params.id,
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
                    { startLoading: false, stopLoading: true },
                )
            })
    },
}