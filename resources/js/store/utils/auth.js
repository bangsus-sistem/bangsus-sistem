
export default {
    state: {
        features: [],
        widgets: [],
    },
    getters: {
        features: state => state.features,
        widgets: state => state.widgets,
    },
    mutations: {
        setFeatures(state, data) {
            state.features = data
        },
        setWidgets(state, data) {
            state.widgets = data
        },
    },
    actions: {
        setFeatures(context, data) {
            context.commit('setFeatures', data)
        },
        setWidgets(context, data) {
            context.commit('setWidgets', data)
        },
    },
}