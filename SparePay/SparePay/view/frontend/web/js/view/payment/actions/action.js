/**
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * Author Robert Hillebrand - hillebrand@i-ways.de - i-ways sales solutions GmbH
 * Copyright i-ways sales solutions GmbH © 2015. All Rights Reserved.
 * License http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */
 define(
    [
        'jquery',
    ],
    function ($) {
        'use strict';

        return function(appid, xapikey, payload, signature, callback) {
            var url = 'https://devpayment.tryspare.com/api/v1.0/payments/domestic/Create';
          return $.ajax({
            type: "POST",
            url: url,
            contentType: 'application/json',
            data: JSON.stringify(payload),
            dataType: "json",
            headers: {
            'app-id': `${appid}`,
            'x-api-key': `${xapikey}`,
            'contentType': 'application/json',
            'x-signature': `${signature}`
            },
            success: callback
            });
        }
    }
);
