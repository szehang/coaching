<?php

require "server.php";

// $clientToken = $gateway->clientToken()->generate([
// 	"customerId" => $aCustomerId
// ]);

echo($clientToken = $gateway->clientToken()->generate());
?>