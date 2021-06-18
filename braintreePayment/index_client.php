<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<script src="https://js.braintreegateway.com/web/dropin/1.22.1/js/dropin.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

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

	<form action="payment.php" method="post" id="payment-form" class="payment-form" style="width: fit-content;">
        <label for="firstName" class="heading">First Name</label><br>
        <input type="text" name="firstName" id="firstName" value="Student01" readonly><br><br>

        <label for="lastName" class="heading">Last Name</label><br>
        <input type="text" name="lastName" id="lastName" value="Coaching" readonly><br><br>

        <label for="amount" class="heading">Amount (HKD)</label><br>
        <input type="text" name="amount" id="amount" value="30" readonly><br><br>

        <input type="hidden" name="payment_method_nonce" id="payment_method_nonce">

        <div id="dropin-container"></div>
        <br>
        <button type="button" id="submit-button">Pay</button>
    </form>

	<script>
		var client_token = "";

		$.ajax({
	        url: "server_clientToken.php",
	        type: "get",
	        dataType: "text",
	        success: function (data) {
	            // braintree.setup(data,'dropin', { container: 'dropin-container'});
	            client_token = data;
	            // console.log(data);

				var button = document.querySelector('#submit-button');

		        braintree.dropin.create({
			      authorization: client_token,
			      container: '#dropin-container'
			    }, function (createErr, instance) {
					if (createErr) {
						// Handle any errors that might've occurred when creating Drop-in
						console.error(createErr);
						return;
					}
					button.addEventListener('click', function () {
				        instance.requestPaymentMethod(function (requestPaymentMethodErr, payload) {
				        	if (requestPaymentMethodErr) {
						        // Handle errors in requesting payment method
						        console.error(requestPaymentMethodErr);
						  	}
				          // Submit payload.nonce to your server
				          	// $('#payment_method_nonce').value = payload.nonce;
				          	console.log(payload.nonce);
				          	$('#payment_method_nonce').val(payload.nonce);
				          	document.getElementById("payment-form").submit();
				        });
			      });
			    });
			}
	    });
	</script>

</body>
</html>