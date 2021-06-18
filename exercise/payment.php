<?php

require "boot.php";

if (empty($_POST['payment_method_nonce'])) {
    header('location: index.php');
}

$result = Braintree_Transaction::sale([
  'amount' => $_POST['amount'], 
  'paymentMethodNonce' => $_POST['payment_method_nonce'],
  'customer' => [
    'firstName' => $_POST['firstName'],
    'lastName' => $_POST['lastName'],    
  ], 
  'options' => [
    'submitForSettlement' => true
  ]
]);

if ($result->success === true) {
    
} else
{
    print_r($result->errors);
    die();
}

//Now, i think all done. Let's test it out.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Report</title>
     <style>
        label.heading {
            font-weight: 600;
        }
        .payment-form {
            width: 300px;
            margin-left: auto;
            margin-right: auto;
            padding: 10px;
            border: 1px #333 solid;
        }
    </style>
</head>
<body style="text-align: center; margin-top: 100px;">
    <form class="payment-form">
        <label for="ID" class="heading">Transaction ID</label><br>
        <input type="text" disabled="disabled" name="ID" id="ID" value="<?php echo $result->transaction->id ;?>"><br><br>

        <label for="firstName" class="heading">First Name</label><br>
        <input type="text" disabled="disabled" name="firstName" id="firstName" value="<?php echo $result->transaction->customer['firstName'] ;?>"><br><br>

        <label for="lastName" class="heading">Last Name</label><br>
        <input type="text" disabled="disabled" name="lastName" id="lastName" value="<?php echo $result->transaction->customer['lastName'] ;?>"><br><br>

        <label for="amount" class="heading">Amount (USD)</label><br>
        <input type="text" disabled="disabled" name="amount" id="amount" value="<?php echo $result->transaction->amount ." " . $result->transaction->currencyIsoCode ;?>"><br><br>

        <label for="status" class="heading">Status</label><br>
        <input type="text" disabled="disabled" name="status" id="status" value="Successful"><br><br>

        
        <br><br>


    </form>
    
</body>
</html>
