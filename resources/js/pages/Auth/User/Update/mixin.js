import commonMixin from '../common/mixin'

export default {
    mixins: [commonMixin],
    created() {
        this.fetchAndSetFormData(
            '/ajax/auth/user/' + this.$route.params.id,
            { resolve: true, reject: false },
            { startLoading: true, stopLoading: false },
            this.getFormDataCallback()
        )
            .then(res => {
                if (res.data.hidden) this.$router.push({ name: 'system.user' })

                this.fetchAndSetMultipleResources(
                    {
                        'roles': '/ajax/auth/role/all',
                        'branches': '/ajax/system/branch/all',
                    },
                    { resolve: false, reject: false },
                    { startLoading: false, stopLoading: true },
                )
            })
    },
}