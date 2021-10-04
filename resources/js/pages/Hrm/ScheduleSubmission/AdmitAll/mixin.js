import commonMixin from '../common/mixin'

export default {
    mixins: [commonMixin],
    data() {
        return {
            form: {
                data: {
                    month: '',
                },
                errors: {
                    month: [],
                },
            }
        }
    }
}