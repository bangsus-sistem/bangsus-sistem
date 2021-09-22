
const datetimeMethods = {
    
    /**
    | ---------------------------------------------------------------
    | DATETIME FUNCTIONALITIES
    | ---------------------------------------------------------------
    | 
    */

    /**
     * Parse the timestamp into standard datetime.
     * 
     * @deprecated
     * @param  {String}  datetime
     * @return {String}
     */
    standardDatetime(datetime = null) {
        moment.locale('id')
        return datetime == null ? '-' : moment(datetime).format('dddd, Do MMMM YYYY H:mm:ss')
    },

    /**
     * Parse the timestamp into standard date.
     * 
     * @deprecated
     * @param  {String}  datetime
     * @return {String}
     */
    standardDate(datetime = null) {
        moment.locale('id')
        return datetime == null ? '-' : moment(datetime).format('dddd, Do MMMM YYYY')
    },

    /**
     * Parse the timestamp to ISO standard date for HTML component.
     * 
     * @param  {String}  datetime
     * @return {String}
     */
    isoDatetime(datetime = null) {
        moment.locale('id')
        return datetime == null ? null : moment(datetime).format('YYYY-MM-DD[T]HH:mm:ss')
    }

    // --------------------------------------------------------------

}

export default datetimeMethods
