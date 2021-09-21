import commonMixin from '../common/mixin'

export default {
    mixins: [commonMixin],
    created() {
        this.fetchAndSetMultipleResources({
            'branch_types': '/ajax/system/branch_type/all',
        }, { resolve: false, reject: false })
    },
}