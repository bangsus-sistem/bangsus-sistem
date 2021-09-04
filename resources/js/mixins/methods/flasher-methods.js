
const flasherMethods = {
    
    /**
    | ---------------------------------------------------------------
    | FLASHER FUNCTIONALITIES
    | ---------------------------------------------------------------
    | 
    */

    /**
     * Dispatch new flashers to the store.
     * 
     * @param  {String}  content
     * @param  {String}  color
     * @return {Number}
     */
    addFlasher(content = '', color = 'success') {
        this.$store.dispatch('utils/flashers/addFlasher', {
            content: content,
            color: color,
        })
    },

    /**
     * Dispatch new success flashers to the store.
     * 
     * @param  {String}  content
     * @return {Number}
     */
    addSuccessFlasher(content = '') {
        this.addFlasher(content, 'success')
    },

    /**
     * Dispatch new success flashers to the store.
     * 
     * @param  {String}  content
     * @return {Number}
     */
    addErrorFlasher(content = '') {
        this.addFlasher(content, 'danger')
    },

    // --------------------------------------------------------------

}

export default flasherMethods
