import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            form: {
                data: {
                    'user': {},
                    'created_at': '',
                    'state': '',
                },
            },
        }
    },
    created() {
        this.fetchAndSetFormData(
            '/ajax/log/authentication_log/' + this.$route.params.id,
            { resolve: false, reject: false },
            { startLoading: true, stopLoading: true },
        )
    },
}