
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
     * @return {Number}
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
     * @return {Number}
     */
    standardDate(datetime = null) {
        moment.locale('id')
        return datetime == null ? '-' : moment(datetime).format('dddd, Do MMMM YYYY')
    },

    // --------------------------------------------------------------

}

export default datetimeMethods
