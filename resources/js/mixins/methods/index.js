import queryMethods from './query-methods'
import resultMethods from './result-methods'
import formMethods from './form-methods'
import errorMethods from './error-methods'
import stateMethods from './state-methods'
import resourceMethods from './resource-methods'
import datetimeMethods from './datetime-methods'
import flasherMethods from './flasher-methods'
import langMethods from './lang-methods'
import utilsMethods from './utils-methods'


const methods = {
    ...queryMethods,
    ...resultMethods,
    ...formMethods,
    ...errorMethods,
    ...stateMethods,
    ...resourceMethods,
    ...datetimeMethods,
    ...flasherMethods,
    ...langMethods,
    ...utilsMethods,
}

export default methods
