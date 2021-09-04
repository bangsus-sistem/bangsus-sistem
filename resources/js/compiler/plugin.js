
class Plugin
{
    static getRouterInstance() {
        return require('./plugins/router').default
    }

    static getStoreInstance() {
        return require('./plugins/store').default
    }

    static initiateMobileDetection() {
        require('./plugins/mobile-detection').default
    }

    static initiateFragment() {
        require('./plugins/fragment').default
    }

    static initiateFrag() {
        require('./plugins/frag').default
    }
}

export default Plugin