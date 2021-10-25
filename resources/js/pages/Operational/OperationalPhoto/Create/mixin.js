import commonMixin from '../common/mixin'

export default {
    mixins: [commonMixin],
    created() {
        this.fetchAndSetMultipleResources({
            'branches': '/ajax/system/branch/all',
            'operational_photo_types': '/ajax/master/operational_photo_type/all',
        })
    },
}