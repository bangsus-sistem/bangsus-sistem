export default {
    props: {
        loading: {
            required: true,
            type: Boolean,
        },
        resources: {
            type: Object,
            default() {
                return {}
            }
        },
        value: {
            required: true,
            type: Object,
        },
    },
    created() {
        this.query = this.value
    },
    data() {
        return {
            query: {}
        }
    },
    watch: {
        query(ne, old) {
            this.$emit('input', ne)
        }
    }
}