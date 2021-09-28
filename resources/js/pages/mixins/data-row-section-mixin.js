
export default {
    props: {
        item: {
            required: true,
            type: Object,
        },
        num: {
            type: Number,
            default: 0,
        },
    },
    methods: {
        standardDatetime(datetime = null) {
            moment.locale('id')
            return datetime == null ? '-' : moment(datetime).format('dddd, Do MMMM YYYY H:mm:ss')
        },
        standardDate(datetime = null) {
            moment.locale('id')
            return datetime == null ? '-' : moment(datetime).format('dddd, Do MMMM YYYY')
        },
        __(index) {
            let res = this.$store.getters['utils/lang/src']
            let indexes = index.split('.')
            indexes.forEach(index => {
                res = res[index]
            })
            return res
        },
    }
}