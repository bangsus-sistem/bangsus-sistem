export default {
    data() {
        return {
            state: {
                widget: {
                    loading: true,
                }
            }
        }
    },
    methods: {
        startWidgetLoading() {
            this.state.widget.loading = true
        },
        stopWidgetLoading() {
            this.state.widget.loading = false
        },
        fetchData() {
            this.startWidgetLoading()
            this.requestData().then(res => {
                this.setData(res)
                this.stopWidgetLoading()
            })
        },
        reloadData() {
            this.requestData().then(res => this.setData(res))
        },
        requestData() {
            return axios.get(this.meta.source, { params: this.query })
        },
        setData(res) {
            this.data = res.data
        },
        standardDatetime(datetime = null) {
            moment.locale('id')
            return datetime == null ? '-' : moment(datetime).format('dddd, Do MMMM YYYY H:mm:ss')
        },
        showModalForm(wrapper, ref, data, link = null, method = null) {
            this.$refs[wrapper].$refs[ref].setData(data)
            this.$refs[wrapper].$refs[ref].setLink(link)
            this.$refs[wrapper].$refs[ref].setMethod(method)
    
            this.$refs[wrapper].$refs[ref].show()
        },
    },
    created() {
        this.fetchData()
    }
}