import commonMixin from '../common/mixin'

export default {
    mixins: [commonMixin],
    created() {
        this.fetchAndSetMultipleResources({
            'roles': '/ajax/auth/role/all',
            'branches': '/ajax/system/branch/all',
        }, { resolve: false, reject: false })
    },
}