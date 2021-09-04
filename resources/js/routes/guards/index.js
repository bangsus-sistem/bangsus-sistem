import axios from "axios"
import store from '../../compiler/plugins/store'

const guards = {

    /**
     * Check if the user is authenticated.
     * If the user is unauthenticated then the function will
     * redirect to login route.
     */
    authenticated: (to, from, next) => {
        axios.get('/ajax/utils/authenticated')
            .then(res => {
                if (res.data['logged_in']) {
                    next()
                } else {
                    store.dispatch('utils/flashers/addFlasher', {
                        color: 'danger',
                        content: 'Anda harus login terlebih dahulu',
                    })
                    next({ name: 'login' })
                }
            })
            .catch(err => {
                
            })
    },

    /**
     * Check if the user is unauthenticated.
     * If the user is authenticated then return to previous route.
     */
    unauthenticated: (to, from, next) => {
        axios.get('/ajax/utils/authenticated')
            .then(res => {
                if (res.data['logged_in']) next({ name: from.name || 'dashboard' })
                else next()
            })
            .catch(err => {
                
            })
    },

    /**
     * Check if there's new version up and coming
     */
    versionCheck: (to, from, next) => {
        axios.get('/ajax/utils/version_check')
            .then(res => {
                let serverAppVersion = res.data['app_version']
                let currentAppVersion = store.getters['utils/versionControl/appVersion']
                if (serverAppVersion !== currentAppVersion) {
                    window.location.href = to.path
                } else {
                    next()
                }
            })
    },

    /**
     * Store history.
     */
    log: (to, from, next) => {
        // Check the latest route from store, if it's the same, then we just
        // skip.
        const lastRoute = store.getters['utils/history/latestPlain']
        if (lastRoute != undefined) {
            if (lastRoute.name == to.name) {
                next()
                return
            }
        }

        // Check the route name, if it's different than before, then we need to
        // log it to the plain as well.
        if (to.name != from.name) {
            store.dispatch('utils/history/addPlain', to)
        }
        store.dispatch('utils/history/addDeep', to)
        next()
    },



    /**
     * For test purposes only.
     */
    access: (to, from, next) => {
        next()
    },
}

export default guards