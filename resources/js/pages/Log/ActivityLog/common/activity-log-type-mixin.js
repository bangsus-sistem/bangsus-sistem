
export default {
    methods: {
        translateActivityLogType(type) {
            let trans = ''
            switch (type) {
                case 'feature' :
                    trans = 'Fitur'
                    break
                case 'widget' :
                    trans = 'Widget'
                    break
                case 'report' :
                    trans = 'Laporan'
                    break
            }
            return trans
        },
    }
}