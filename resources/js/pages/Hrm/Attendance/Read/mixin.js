import commonMixin from '../common/mixin'

export default {
    mixins: [commonMixin],
    created() {
        this.fetchAndSetFormData(
            '/ajax/hrm/attendance/' + this.$route.params.id,
            { resolve: true, reject: false },
            { startLoading: true, stopLoading: true },
            this.getFormDataCallback()
        )
            .then(res => {
                console.log(res)
            })
    },
}