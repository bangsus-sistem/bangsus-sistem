
const langMethods = {
    
    /**
    | ---------------------------------------------------------------
    | LANG FUNCTIONALITIES
    | ---------------------------------------------------------------
    | 
    */

    /**
     * Get the language resource.
     * 
     * @param  {String}  index
     * @return {*}
     */
    __(index) {
        let res = this.$store.getters['utils/lang/src']
        let indexes = index.split('.')
        indexes.forEach(index => {
            res = res[index]
        })
        return res
    },

    // --------------------------------------------------------------

}

export default langMethods
