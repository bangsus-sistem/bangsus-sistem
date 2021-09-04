
export default {
    state: {
        appVersion: localStorage.getItem('appVersion') || null,
    },
    getters: {
        appVersion: state => state.appVersion,
    },
    mutations: {
        setAppVersion(state, ver) {
            state.appVersion = ver
            localStorage.setItem('appVersion', state.appVersion)
        },
    },
    actions: {
        setAppVersion(context, ver) {
            context.commit('setAppVersion', ver)
        },
    },
}