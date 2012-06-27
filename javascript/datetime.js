/*___ FILE: "JQUERY4U.datetime.js" ___*/
;(function($)
{
    /**
     * jQuery Date and time functions - Complete List
     */
    JQUERY4U.DATETIME =
    {
        /**
         * Name of this class (used for error handling and/or debugging purposes)
         * @type String
         */
        name: 'JQUERY4U.DATETIME',

        init: function()
        {
            JQUERY4U.UTIL.handleErrors(this);
            Date.prototype.JQUERY4UFormat = this.format;
        },

        /**
         * Return today's date in dd/mm/yyyy format
         * @returns {String} Date in dd/mm/yyyy format
         */
        todaysDate: function()
        {
            return this.futureDateDays(0);
        },

        /**
         * Return tomorrow's date in dd/mm/yyyy format
         * @returns {String} Date in dd/mm/yyyy format
         */
        tomorrowsDate: function()
        {
            return this.futureDateDays(1);
        },

        /**
         * Return date 7 days from now in dd/mm/yyyy format
         * @returns {String} Date in dd/mm/yyyy format
         */
        weekFromToday: function()
        {
            return this.futureDateDays(7);
        },

        /**
         * Return the first day of the next month
         * @returns {String} Date in dd/mm/yyyy format
         */
        firstDayNextMonth: function()
        {
            var today = new Date();
            nextMonth = new Date(today.getFullYear(), today.getMonth() + 1, 1);
            nextMonth.getDate() +'/'+ (nextMonth.getMonth() + 1) +'/'+ nextMonth.getFullYear();
            return this.leadingZero(nextMonth.getDate()) +'/'+ this.leadingZero(nextMonth.getMonth() + 1) +'/'+ nextMonth.getFullYear();
        },

        /**
         * Returns x number of dates date in the future in dd/mm/yyyy format
         * @param {Integer} days Number of days into the future
         * @returns {String} Date in dd/mm/yyyy format
         */
        futureDateDays: function(days)
        {
            var futureDate = new Date();
            futureDate.setDate(futureDate.getDate() + days);
            return this.leadingZero(futureDate.getDate()) +'/'+ this.leadingZero(futureDate.getMonth() + 1) +'/'+ this.leadingZero(futureDate .getFullYear());
        },

        /**
         * Return the current time in HHMM format
         * @returns {String} Time in HHMM (e.g. 23:12) format
         */
        timeHHMM: function()
        {
            var today = new Date();
            return this.leadingZero(today.getHours()) + this.leadingZero(today.getMinutes());
        },

        /**
         * Return the current time in HHMMSS format
         * @returns {String} Time in HHMMSS (e.g. 23:12:33) format
         */
        timeHHMMSS: function()
        {
            var today = new Date();
            return this.leadingZero(today.getHours()) +':'+ this.leadingZero(today.getMinutes()) +':'+ this.leadingZero(today.getSeconds());
        },

        /**
         * Takes a date string in Australian format and returns date string in US format
         * @param {String} dateStr Date in dd/mm/yyyy format
         * @param {String} [separator="-"] separator character in return date string
         * @returns {String} date in mm/dd/yyyy format
         */
        convertUSFormat: function(dateStr, separator)
        {
            var separator = (typeof(separator) == 'undefined') ? '-' : separator;
            var re = new RegExp('([0-9]{2})/([0-9]{2})/([0-9]{4})', 'm');
            var matches = re.exec(dateStr);
            return matches[2] + separator + matches[1] + separator + matches[3];
        },

        /**
         * Convert date in mm/dd/yyyy format and return in dd-mm-yyyy format (depending upon separator)
         * @param {String} dateStr Date in mm/dd/yyyy format
         * @param {String} [separator="-"] Separator character in return date string
         * @returns {String} Date in mm-dd-yyyy format (presuming "-" is separator character)
         */
        convertUStoAUSDate: function(dateStr, separator)
        {
            var separator = (typeof(separator) == 'undefined') ? '-' : separator;
            var re = new RegExp('([0-9]{2})/([0-9]{2})/([0-9]{4})', 'm');
            var matches = re.exec(dateStr);
            return matches[2] + separator + matches[1] + separator + matches[3];
        },

        /**
         * Return whether the supplied date components form the expected date
         * @param {String} year
         * @param {String} month
         * @param {String} day
         * @returns {Boolean} True if the date components match the date values in Date object
         */
        isValidDate: function(year, month, day)
        {
            var dt = new Date(parseInt(year, 10), parseInt(month, 10)-1, parseInt(day, 10));
            if(dt.getDate() != parseInt(day, 10) || dt.getMonth() != (parseInt(month, 10)-1) || dt.getFullYear() != parseInt(year, 10))
            {
                return false;
            }

            return true;
        },

        /**
         * Takes a date object and returns in yyyymmdd format
         * @param {Date Object} dateObj
         * @returns {String} Date in yyyymmdd format
         */
        dateToYYYYMMDD: function(dateObj)
        {
            return  (dateObj.getFullYear() + this.leadingZero(dateObj.getMonth() + 1) + this.leadingZero(dateObj.getDate())).toString();
        },

        /**
         * Takes a date object and returns in ddmmyyyy format
         * @param {Date Object} dateObj
         * @returns {String} Date in ddmmyyyy format
         */
        dateToDDMMYYYY: function(dateObj)
        {
            return  (this.leadingZero(dateObj.getDate()) + this.leadingZero(dateObj.getMonth() + 1) + dateObj.getFullYear()).toString();
        },

        /**
         * Takes a date string in dd/mm/yyyy format
         * @param {String} dateString Date in dd/mm/yyyy format
         * @returns {Date Object} Returns false if date sring is invalid
         */
        stringToDate: function(dateString)
        {
            try
            {
                var matches = dateString.match(/([0-9]{2})\/([0-9]{2})\/([0-9]{4})/);
                if(this.isValidDate(matches[3], matches[2], matches[1]) === false)
                {
                    return false;
                }

                return new Date(matches[3], parseInt(matches[2], 10)-1, parseInt(matches[1], 10));
            }
            catch(e)
            {
                return false;
            }
        },

        /**
         * Adds leading zero if passed value is single digit
         * @param {String} val
         * @returns {String}
         */
        leadingZero: function(val)
        {
            var str = val.toString();
            if(str.length == 1)
            {
                str = '0' + str;
            }

            return str;
        },

        /**
         * Checks if return date is equal or after departure date
         * @param {String} departureDate
         * @param {String} returnDate
         * @returns {Boolean}
         */
        isDepartureReturnDateValid: function(departureDate, returnDate)
        {
            var dep = this.stringToDate(departureDate);
            var ret = this.stringToDate(returnDate);
            if(dep > ret)
            {
                return false;
            }

            return true;
        },

        /**
         * Detect whether the year supplied is a leap year
         * @param {Integer} year
         * @returns {Boolean}
         */
        isLeapYear: function(year)
        {
            year = parseInt(year, 10);
            if(year % 4 == 0)
            {
                if(year % 100 != 0)
                {
                    return true;
                }
                else
                {
                    if(year % 400 == 0)
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }
                }
            }
            return false;
        },

        compareDates: function(from, to)
        {
            var dateResult = to.getTime() - from.getTime();
            var dateObj = {};
            dateObj.weeks =  Math.round(dateResult/(1000 * 60 * 60 * 24 * 7));
            dateObj.days = Math.ceil(dateResult/(1000 * 60 * 60 * 24));
            dateObj.hours = Math.ceil(dateResult/(1000 * 60 * 60));
            dateObj.minutes = Math.ceil(dateResult/(1000 * 60));
            dateObj.seconds = Math.ceil(dateResult/(1000));
            dateObj.milliseconds = dateResult;
            return dateObj;
        },

        compareDatesDDMMYYYY: function(from, to)
        {
            from = from.split('/');
            from = new Date(from[2], from[1], from[0]);
            to = to.split('/');
            to = new Date(to[2], to[1], to[0]);
            return this.compareDates(from, to);
        },

        /**
         * Allow nice formatting of dates like PHP's Date function
         * Derived from code written by Jac Wright at http://jacwright.com/projects/javascript/date_format
         * @param {Date} date JavaScript date object
         * @param {String} format Date format string
         * @returns {String}
         */
        format: function()
        {
            var date,
                format,
                args = [].slice.call(arguments),
                returnStr = '',
                curChar = '',
                months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                methods =
                {
                    // Day
                    d: function() { return (date.getDate() < 10 ? '0' : '') + date.getDate(); },
                    D: function() { return days[date.getDay()].substring(0, 3); },
                    j: function() { return date.getDate(); },
                    l: function() { return days[date.getDay()]; },
                    N: function() { return date.getDay() + 1; },
                    S: function() { return (date.getDate() % 10 == 1 && date.getDate() != 11 ? 'st' : (date.getDate() % 10 == 2 && date.getDate() != 12 ? 'nd' : (date.getDate() % 10 == 3 && date.getDate() != 13 ? 'rd' : 'th'))); },
                    w: function() { return date.getDay(); },

                    // Month
                    F: function() { return months[date.getMonth()]; },
                    m: function() { return (date.getMonth() < 9 ? '0' : '') + (date.getMonth() + 1); },
                    M: function() { return months[date.getMonth()].substring(0, 3); },
                    n: function() { return date.getMonth() + 1; },
                    Y: function() { return date.getFullYear(); },
                    y: function() { return ('' + date.getFullYear()).substr(2); },

                    // Time
                    a: function() { return date.getHours() < 12 ? 'am' : 'pm'; },
                    A: function() { return date.getHours() < 12 ? 'AM' : 'PM'; },
                    g: function() { return date.getHours() % 12 || 12; },
                    G: function() { return date.getHours(); },
                    h: function() { return ((date.getHours() % 12 || 12) < 10 ? '0' : '') + (date.getHours() % 12 || 12); },
                    H: function() { return (date.getHours() < 10 ? '0' : '') + date.getHours(); },
                    i: function() { return (date.getMinutes() < 10 ? '0' : '') + date.getMinutes(); },
                    s: function() { return (date.getSeconds() < 10 ? '0' : '') + date.getSeconds(); },

                    // Timezone
                    O: function() { return (-date.getTimezoneOffset() < 0 ? '-' : '+') + (Math.abs(date.getTimezoneOffset() / 60) < 10 ? '0' : '') + (Math.abs(date.getTimezoneOffset() / 60)) + '00'; },
                    P: function() { return (-date.getTimezoneOffset() < 0 ? '-' : '+') + (Math.abs(date.getTimezoneOffset() / 60) < 10 ? '0' : '') + (Math.abs(date.getTimezoneOffset() / 60)) + ':' + (Math.abs(date.getTimezoneOffset() % 60) < 10 ? '0' : '') + (Math.abs(date.getTimezoneOffset() % 60)); },
                    T: function() { var m = date.getMonth(); date.setMonth(0); var result = date.toTimeString().replace(/^.+ \(?([^\)]+)\)?$/, '$1'); date.setMonth(m); return result;},
                    Z: function() { return -date.getTimezoneOffset() * 60; },

                    // Full Date/Time
                    c: function() { return date.format("Y-m-d") + "T" + date.format("H:i:sP"); },
                    r: function() { return date.toString(); },
                    U: function() { return date.getTime() / 1000; }
                };

            if(typeof this.getMonth == 'function')
            {
                date = this;
                format = args[0];
            }
            else
            {
                date = args[0];
                format = args[1];
            }

            for(var i = 0; i < format.length; i++)
            {
                var curChar = format.charAt(i);
                if(methods[curChar])
                {
                    returnStr += methods[curChar].call();
                }
                else
                {
                    returnStr += curChar;
                }
            }
            return returnStr;
        }
    };

    JQUERY4U.DATETIME.init();
})(jQuery);