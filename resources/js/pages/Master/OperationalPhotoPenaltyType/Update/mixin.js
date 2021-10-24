import commonMixin from '../common/mixin'

export default {
    mixins: [commonMixin],
    created() {
        this.fetchAndSetFormData(
            '/ajax/master/operational_photo_penalty_type/' + this.$route.params.id,
            { resolve: false, reject: false },
            { startLoading: true, stopLoading: true },
            this.getFormDataCallback()
        )
    },
}