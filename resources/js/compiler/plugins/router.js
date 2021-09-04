import Vue from 'vue'
import VueRouter from 'vue-router'
import routes from '../../routes'
import qs from 'qs'

Vue.use(VueRouter)
export default new VueRouter({
    mode: 'history',
    routes,
    parseQuery(query) {
        return qs.parse(query);
    },
    stringifyQuery(query) {
        let result = qs.stringify(query);
        return result ? ('?' + result) : '';
    }
})