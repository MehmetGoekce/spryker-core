/**
 * Copyright (c) 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

'use strict';

require('ZedGui');

$(document).ready(function() {

    function getGtmDateTimeString(datetext) {
        var d = new Date();
        d = new Date(d.valueOf() + d.getTimezoneOffset() * 60000);

        var h = d.getHours();
        h = (h < 10) ? ("0" + h) : h ;

        var m = d.getMinutes();
        m = (m < 10) ? ("0" + m) : m ;

        var s = d.getSeconds();
        s = (s < 10) ? ("0" + s) : s ;

        return datetext + " " + h + ":" + m + ":" + s;
    }

    var $fromDateTime = $('#product_concrete_form_edit_valid_from');
    var $toDateTime = $('#product_concrete_form_edit_valid_to');

    $fromDateTime.datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        numberOfMonths: 3,
        defaultData: 0,
        onSelect: function(datetext){
            $fromDateTime.val(getGtmDateTimeString(datetext));
        }
    });

    $toDateTime.datepicker({
        defaultData: 0,
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        numberOfMonths: 3,
        onSelect: function(datetext){
            $toDateTime.val(getGtmDateTimeString(datetext));
        }
    });
});
