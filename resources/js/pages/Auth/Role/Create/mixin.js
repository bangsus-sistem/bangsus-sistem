import commonMixin from '../common/mixin'

export default {
    mixins: [commonMixin],
    created() {
        this.fetchAndSetMultipleResources({
            'packages': '/ajax/auth/package/all',
            'modules': '/ajax/auth/module/all',
            'actions': '/ajax/auth/action/all',
            'widgets': '/ajax/auth/widget/all',
            'reports': '/ajax/auth/report/all',
            'features': '/ajax/auth/feature/all',
        }, { resolve: false, reject: false })
    },
}