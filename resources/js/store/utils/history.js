
export default {
    state: {
        plain: JSON.parse(localStorage.getItem('plainHistory')) || [],
        deep: JSON.parse(localStorage.getItem('deepHistory')) || [],
    },
    getters: {
        plain: state => state.plain,
        deep: state => state.deep,
        latestPlain: state => {
            const index = state.plain.length - 1
            return index >= 0
                ?   state.plain[index]
                :   null
        },
        latestBeforePlain: state => {
            const index = state.plain.length - 2
            return index >= 0
                ?   state.plain[index]
                :   null
        },
        latestDeep: state => {
            const index = state.deep.length - 1
            return index >= 0
                ?   state.deep[index]
                :   null
        },
        latestBeforeDeep: state => {
            const index = state.deep.length - 2
            return index >= 0
                ?   state.deep[index]
                :   null
        },
    },
    mutations: {
        addPlain(state, data) {
            data = {
                query: data.query,
                path: data.path,
                name: data.name,
            }
            state.plain.push(data)
            localStorage.setItem('plainHistory', JSON.stringify(state.plain))
        },
        addDeep(state, data) {
            data = {
                query: data.query,
                path: data.path,
                name: data.name,
            }
            state.deep.push(data)
            localStorage.setItem('deepHistory', JSON.stringify(state.deep))
        },
        resetPlain(state) {
            state.plain = []
            localStorage.setItem('plainHistory', JSON.stringify(state.plain))
        },
        resetDeep(state) {
            state.deep = []
            localStorage.setItem('deepHistory', JSON.stringify(state.deep))
        },
        deleteLatestPlain(state) {
            state.plain.pop()
        },
        deleteLatestDeep(state) {
            state.plain.pop()
        },
    },
    actions: {
        addPlain(context, data) {
            context.commit('addPlain', data)
        },
        addDeep(context, data) {
            context.commit('addDeep', data)
        },
        resetPlain(context) {
            context.commit('resetPlain')
        },
        resetDeep(context) {
            context.commit('resetDeep')
        },
        reset() {
            this.dispatch('utils/history/resetPlain')
            this.dispatch('utils/history/resetDeep')
        },
        deleteLatestPlain(context) {
            context.commit('deleteLatestPlain')
        },
        deleteLatestDeep(context) {
            context.commit('deleteLatestDeep')
        },
        deleteLatest() {
            this.dispatch('utils/history/deleteLatestPlain')
            this.dispatch('utils/history/deleteLatestDeep')
        },
    },
}
