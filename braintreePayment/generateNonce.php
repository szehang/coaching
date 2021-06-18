<?php
require "server.php";

$result = $gateway->paymentMethodNonce()->create('A_PAYMENT_METHOD_TOKEN');
$nonce = $result->paymentMethodNonce->nonce;

echo($nonce);
?>