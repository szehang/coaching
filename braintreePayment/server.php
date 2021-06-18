<?php

require "vendor/autoload.php";

$gateway = new Braintree_Gateway([
	'environment' => 'sandbox',
	'merchantId' => 'rytzmdk839nk5fbm',
	'publicKey' => 'g259xh5jd7dyv66v',
	'privateKey' => '47e0009265307deea1261d4c2af0aa4a'
]);

?>