import flashers from './utils/flashers'
import versionControl from './utils/version-control'
import lang from './utils/lang'
import history from './utils/history'
import auth from './utils/auth'

export default {
    modules: {

        // Utils package
        utils: {
            namespaced: true,
            modules: {

                // Utils.Flashers package
                flashers: {
                    namespaced: true,
                    ...flashers
                },

                // Utils.VersionControl package
                versionControl: {
                    namespaced: true,
                    ...versionControl,
                },

                // Utils.Lang package
                lang: {
                    namespaced: true,
                    ...lang,
                },

                // Utils.History package
                history: {
                    namespaced: true,
                    ...history,
                },

                // Utils.Auth package
                auth: {
                    namespaced: true,
                    ...auth,
                }
            }
        },
    }
}