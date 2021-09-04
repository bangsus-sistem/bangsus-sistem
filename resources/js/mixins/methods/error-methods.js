
const errorMethods = {
    
    /**
    | ---------------------------------------------------------------
    | ERRORS FUNCTIONALITIES
    | ---------------------------------------------------------------
    | Errors functionalities would handle the error occurs when
    | submitting or fetching.
    */

    /**
     * Parse the status code.
     * 
     * @param  {Object} err 
     * @return {Number}
     */
    parseErrorStatus(err) {
        return err.response.status
    },

    /**
     * Parse the error message.
     * 
     * @param  {Object} err 
     * @return {String}
     */
    parseErrorMessage(err) {
        return err.response.data.message || this.__('errors.default')
    },

    /**
     * Handle the result fetch error.
     * 
     * @param  {Object}  err
     * @param  {Boolean} flash
     * @return {void}
     */
    handleResultError(err, flash = true) {
        // Grab the status code.
        let status = this.parseErrorStatus(err)

        // If the status is 401, then we need to move to the login page.
        if (status == 401) {
            if (this.$route.name === 'login') {
                this.addErrorFlasher(this.__('errors.authenticating'))
            } else {
                this.addErrorFlasher(this.__('errors.unauthenticated'))
                this.$router.push({ name: 'login' })
            }
        }

        // If the status is 404, then we need to fill it with default
        // not found message.
        if (status == 404) {
            this.setPageError(true)
            if (flash) {
                this.addErrorFlasher(this.__('errors.not_found'))
            }
        }

        // These are the status codes that would be treated as a
        // page error.
        let statusWithPageError = [400, 403, 500, 501, 502, 503]

        // If the status code turns out to be either one of the
        // values specified above, then we must set the page
        // error state to true.
        if (statusWithPageError.indexOf(status) !== -1) {
            this.setPageError(true)
            this.setPageMessage(err)

            // If the flash is true, then we flash the error message
            // to the flasher wrapper.
            if (flash) {
                this.addErrorFlasher(this.parseErrorMessage(err))
            }
        }

        // These are the status code that would be treated as a 
        // form error.
        let statusWithFormError = [422]

        // If the status code turns out to be either one of the
        // values specified above, then we must call the handle
        // form error.
        if (statusWithFormError.indexOf(status) !== -1) {
            this.handleFormError(err, true)
        }
    },

    /**
     * Handler method specifically designed for modal form.
     * 
     * @param  {Object}  err
     * @param  {Boolean} flash
     * @return {void}
     */
    handleModalFormError(err, flash = true) {
        // Grab the status code.
        let status = this.parseErrorStatus(err)

        // If the status is 401, then we need to move to the login page.
        if (status == 401) {
            if (this.$route.name === 'login') {
                this.addErrorFlasher(this.__('errors.authenticating'))
            } else {
                this.addErrorFlasher(this.__('errors.unauthenticated'))
                this.$router.push({ name: 'login' })
            }
        }

        // If the status is 404, then we need to fill it with default
        // not found message.
        if (status == 404) {
            this.setPageError(true)
            if (flash) {
                this.addErrorFlasher(this.__('errors.not_found'))
            }
        }

        // These are the status codes that would be treated as a
        // page error.
        let statusWithPageError = [400, 403, 500, 501, 502, 503]

        // If the status code turns out to be either one of the
        // values specified above, then we must set the page
        // error state to true.
        if (statusWithPageError.indexOf(status) !== -1) {
            this.setPageError(true)
            this.setPageMessage(err)

            // If the flash is true, then we flash the error message
            // to the flasher wrapper.
            if (flash) {
                this.addErrorFlasher(this.parseErrorMessage(err))
            }
        }

        // These are the status code that would be treated as a 
        // form error.
        let statusWithFormError = [422]

        // If the status code turns out to be either one of the
        // values specified above, then we must call the handle
        // form error.
        if (statusWithFormError.indexOf(status) !== -1) {
            this.handleFormError(err, false)
            this.addErrorFlasher(this.parseErrorFeedback(err)['id'][0])
        }
    },

    // --------------------------------------------------------------

}

export default errorMethods
