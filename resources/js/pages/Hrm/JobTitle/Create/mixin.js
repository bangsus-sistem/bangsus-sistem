import commonMixin from '../common/mixin'

export default {
    mixins: [commonMixin],
    created() {
        this.fetchAndSetMultipleResources({
            'divisions': '/ajax/hrm/division/all',
        }, { resolve: false, reject: false })
    },
}