<?php

error_reporting(0);

//autoloading the packages in the vendor folder.
require "vendor/autoload.php";

//setting up braintree credentials
// Braintree_Configuration::environment('sandbox');
// Braintree_Configuration::merchantId('x8wcczgwvtqgmk24');
// Braintree_Configuration::publicKey('cd59gk5t664byr28');
// Braintree_Configuration::privateKey('e2009866a45001d73ed3a7d575f0adc7');

Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('rytzmdk839nk5fbm');
Braintree_Configuration::publicKey('g259xh5jd7dyv66v');
Braintree_Configuration::privateKey('47e0009265307deea1261d4c2af0aa4a');

// $gateway = new Braintree_Gateway([
//   'environment' => 'sandbox',
//   'merchantId' => 'rytzmdk839nk5fbm',
//   'publicKey' => 'g259xh5jd7dyv66v',
//   'privateKey' => '47e0009265307deea1261d4c2af0aa4a'
// ]);

//Booting Done.