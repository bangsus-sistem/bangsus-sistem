
const utilsMethods = {
    
    /**
    | ---------------------------------------------------------------
    | UTILS FUNCTIONALITIES
    | ---------------------------------------------------------------
    | 
    */

    /**
     * Nullsafe the object.
     * 
     * @param  {Object}  obj
     * @param  {*}  val
     * @return {*}
     */
    _objNullsafe(obj, index) {
        return obj == null ? null : obj[index]
    },

    // --------------------------------------------------------------

}

export default utilsMethods
