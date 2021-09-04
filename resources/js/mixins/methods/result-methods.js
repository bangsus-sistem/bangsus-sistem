
const resultMethods = {

    /**
    | --------------------------------------------------------------
    | RESULT FUNCTIONALITIES
    | --------------------------------------------------------------
    | Result functionalities are basically any methods that would
    | complement the result fetching of an index page.
    | There's also some error handling that could relate to the
    | State functionalities.
    */

    /**
     * Parse result items from non-single row data return.
     * 
     * @param  {Object}  res
     * @return {Object}
     */
    parseResultItems(res) {
        return res.data.items
    },

    /**
     * Parse result meta from non-single row data return.
     * 
     * @param  {Object}  res
     * @return {Object}
     */
    parseResultMeta(res) {
        return res.data.meta
    },

    /**
     * Set the result items.
     * 
     * @param  {Object}  res
     * @param  {mixed}  index
     * @return {void}
     */
    setResultItems(res, index = null) {
        if (index != null) {
            this.result[index].items = this.parseResultItems(res)
        } else {
            this.result.items = this.parseResultItems(res)
        }
    },

    /**
     * Set the result meta values.
     * 
     * @param  {Object}  res
     * @param  {mixed}  index
     * @return {void}
     */
    setResultMeta(res, index = null) {
        if (index != null) {
            this.result[index].meta = this.parseResultMeta(res)
        } else {
            this.result.meta = this.parseResultMeta(res)
        }
    },

    /**
     * Set the result.
     * 
     * @param  {Object}  res
     * @param  {mixed}  index
     * @return {void}
     */
    setResult(res, index = null) {
        this.setResultItems(res, index)
        this.setResultMeta(res, index)
    },

    /**
     * 
     * @param  {Boolean}  spinner 
     * @param  {String}   spinnerExpense
     * @param  {mixed}  index
     * @return {void}
     */
    getAndSetResult(spinner = true, spinnerExpense = 'page', index = null) {
        
        // Determine the loading spinner that would be spinned.
        if (spinner) {
            switch (spinnerExpense) {
                case 'page' :
                    this.startPageLoading()
                    break;
                case 'result' :
                    this.startResultLoading(index)
                    break;
            }
        }

        // Fetch result.
        this.fetchResult(index)
            .then(res => {
                this.setResult(res, index)
                this.refreshRouteWithQuery()
            })
            .catch(err => {
                this.handleResultError(err)
            })
            .finally(() => {
                // Determine the loading spinner that would be spinned.
                if (spinner) {
                    switch (spinnerExpense) {
                        case 'page' :
                            this.stopPageLoading()
                            break;
                        case 'result' :
                            this.stopResultLoading(index)
                            break;
                    }
                }
            })
    },
    
    /**
     * Search the data dynamically.
     * 
     * @param  {String}  index 
     * @return {void}
     */
    search(index) {
        this.startResultLoading()
        this.getAndSetResult(true, 'result', index)
    },

    /**
     * Search the data dynamically.
     * 
     * @param  {String}  index 
     * @return {void}
     */
    toggleShow(index) {
        this.meta[index].show = ! this.meta[index].show
    },

    // --------------------------------------------------------------

}

export default resultMethods
