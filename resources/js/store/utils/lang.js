
export default {
    state: {
        src: JSON.parse(localStorage.getItem('langSrc')) || [],
    },
    getters: {
        src: state => state.src,
    },
    mutations: {
        setSrc(state, data) {
            state.src = data
            localStorage.setItem('langSrc', JSON.stringify(state.src))
        },
    },
    actions: {
        setSrc(context, data) {
            context.commit('setSrc', data)
        },
    },
}