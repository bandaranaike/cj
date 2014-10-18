<?php

require_once 'PaymentGateway.php';
require_once 'Paypal.php';

$myPaypal = new Paypal();

$myPaypal->ipnLog = TRUE;

$myPaypal->enableTestMode();

if ($myPaypal->validateIpn()) {
    if ($myPaypal->ipnData['payment_status'] == 'Completed') {
        file_put_contents('paypal.txt', 'SUCCESS');
    } else {
        file_put_contents('paypal.txt', "FAILURE\n\n" . $myPaypal->ipnData);
    }
}