<!DOCTYPE html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices. -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->

  <script type="text/javascript">
    var getParams = function (url) {
      var params = {};
      var parser = document.createElement('a');
      parser.href = url;
      var query = parser.search.substring(1);
      var vars = query.split('&');
      for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split('=');
        params[pair[0]] = decodeURIComponent(pair[1]);
    }
    return params;
  };

  // console.log(getParams(window.location.href));
  </script>
</head>

<body onload="document.querySelector('#amt').value = getParams(window.location.href).amt;">
  <script
    src="https://www.paypal.com/sdk/js?client-id=AVCHs0k04DTtJ0oXA4VHbWWMnb6dgrF3j-lvhK2KRh90-cE-jF74KowtR9XX8O4wKcjnQacTfTjnOm-s"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
  </script>

  <div id="paypal-button-container"></div>

<input id="amt" type="text" value="0.03">

<script>
  paypal.Buttons({
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: document.querySelector("#amt").value
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
        // alert('Transaction completed by ' + details.payer.name.given_name);
        // alert(JSON.stringify(details));

        

        window.close();
      });
    }
  }).render('#paypal-button-container');
  //This function displays Smart Payment Buttons on your web page.
</script>

</body>