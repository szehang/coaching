<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <!-- Load PayPal's checkout.js Library. -->
    <script src="https://www.paypalobjects.com/api/checkout.js" data-version-4 log-level="warn"></script>

    <!-- Load the client component. -->
    <script src="https://js.braintreegateway.com/web/3.60.0/js/client.min.js"></script>

    <!-- Load the PayPal Checkout component. -->
    <script src="https://js.braintreegateway.com/web/3.60.0/js/paypal-checkout.min.js"></script>

    <script src="https://js.braintreegateway.com/web/3.60.0/js/data-collector.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<body style="text-align: center; margin-top: 100px;">
    <form action="payment_Paypal.php" method="post" id="payment-form" class="payment-form" style="width: fit-content;">
        <label for="firstName" class="heading">First Name</label><br>
        <input type="text" name="firstName" id="firstName" value="Student01" readonly><br><br>

        <label for="lastName" class="heading">Last Name</label><br>
        <input type="text" name="lastName" id="lastName" value="Coaching" readonly><br><br>

        <label for="amount" class="heading">Amount (HKD)</label><br>
        <input type="text" name="amount" id="amount" value="30" readonly><br><br>

        <input type="hidden" name="payment_method_nonce" id="payment_method_nonce">
        <div id="paypal-button"></div>
        <!-- <div id="dropin-container"></div> -->
        <br>
        <!-- <button type="button" id="submit-button">Pay</button> -->
    </form>

    <script type="text/javascript">
        // Create a client.
        // var form = document.querySelector('#payment-form');
        var client_token = "";
        var myDeviceData;

        $.ajax({
            url: "server_clientToken.php",
            type: "get",
            dataType: "text",
            success: function (data) {
                client_token = data;
                // console.log(client_token)

                braintree.client.create({
                    authorization: client_token
                }, function (clientErr, clientInstance) {

                    // Stop if there was a problem creating the client.
                    // This could happen if there is a network error or if the authorization
                    // is invalid.
                    if (clientErr) {
                        console.error('Error creating client:', clientErr);
                        return;
                    }

                    braintree.dataCollector.create({
                        client: clientInstance,
                        paypal: true
                    }, function (err, dataCollectorInstance) {
                        if (err) {
                            // Handle error
                            console.error(err);
                            return;
                        }

                        // At this point, you should access the dataCollectorInstance.deviceData value and provide it
                        // to your server, e.g. by injecting it into your form as a hidden input.
                        myDeviceData = dataCollectorInstance.deviceData;
                        dataCollectorInstance.teardown();
                    });

                    // console.log(clientInstance);
                    // Create a PayPal Checkout component.
                    braintree.paypalCheckout.create({
                        client: clientInstance
                    }, function (paypalCheckoutErr, paypalCheckoutInstance) {

                        // Stop if there was a problem creating PayPal Checkout.
                        // This could happen if there was a network error or if it's incorrectly
                        // configured.
                        if (paypalCheckoutErr) {
                            console.error('Error creating PayPal Checkout:', paypalCheckoutErr);
                            return;
                        }

                        // Set up PayPal with the checkout.js library
                        paypal.Button.render({
                            env: 'sandbox', // or 'production'

                            payment: function () {
                                return paypalCheckoutInstance.createPayment({
                                    // Your PayPal options here. For available options, see
                                    // http://braintree.github.io/braintree-web/current/PayPalCheckout.html#createPayment
                                    flow: 'vault',
                                    billingAgreementDescription: 'Purchasing Course XXX'
                                    // enableShippingAddress: true,
                                    // shippingAddressEditable: false,
                                    // shippingAddressOverride: {
                                    //     recipientName: 'Scruff McGruff',
                                    //     line1: '1234 Main St.',
                                    //     line2: 'Unit 1',
                                    //     city: 'Chicago',
                                    //     countryCode: 'US',
                                    //     postalCode: '60652',
                                    //     state: 'IL',
                                    //     phone: '123.456.7890'
                                    // }
                                });
                            },

                            onAuthorize: function (data, actions) {
                                return paypalCheckoutInstance.tokenizePayment(data, function (err, payload) {
                                    if(err){
                                        console.error(err);
                                    }
                                    // Submit `payload.nonce` to your server.
                                    $('#payment_method_nonce').val(payload.nonce);
                                    document.getElementById("payment-form").submit();
                                });
                            },

                            onCancel: function (data) {
                                console.log('checkout.js payment cancelled', JSON.stringify(data, 0, 2));
                            },

                            onError: function (err) {
                                console.error('checkout.js error', err);
                            }

                        }, '#paypal-button').then(function () {
                        // The PayPal button will be rendered in an html element with the id
                        // `paypal-button`. This function will be called when the PayPal button
                        // is set up and ready to be used.
                        });

                    });

                });
            }
        });
    </script>
</body>

</html>