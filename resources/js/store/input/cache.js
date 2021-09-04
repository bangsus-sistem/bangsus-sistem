
export default {
    state: {
        cache: JSON.parse(localStorage.getItem('dataCache')) || {
            'accounting': {
                'account': {
                    'create': {},
                    'update': {},
                }
            }
        }
    },
    getters: {
        cache: state => state.cache
    },
    mutations: {
        setCache(state, package, module, action, data) {
            state.cache[package][module][action] = data
            localStorage.setItem('cache', JSON.stringify(state.cache))
        },
    },
    actions: {
        setCache(context, package, module, action, data) {
            context.commit('setCache', package, module, action, data)
        },
    }
}
