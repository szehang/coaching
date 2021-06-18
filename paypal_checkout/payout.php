<?php
session_start();

$servername = "localhost";
$dbusername = "coachingAdmin";
$dbpassword = "admin3105";
$dbname = "coachingdb";

// Make connection to MySQL
$conn = mysqli_connect($servername, $dbusername, $dbpassword) or die("Connection failed");
mysqli_select_db($conn, $dbname) or die("Could not select database");
//$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Self-defined External CSS -->
    <link rel="stylesheet" href="../style.css">


    <style>
        .main {
          box-shadow: 0px 0px 10px 0px #000;
          border-radius: 10px;
          padding: 30px;
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%,-50%);
          width: 25em;
          height: auto;
          background-color: #fafafa;
        }
    </style>

    <title>E-commerce</title>


</head>

<body>
  <script
    src="https://www.paypal.com/sdk/js?client-id=AVCHs0k04DTtJ0oXA4VHbWWMnb6dgrF3j-lvhK2KRh90-cE-jF74KowtR9XX8O4wKcjnQacTfTjnOm-s"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
  </script>

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="success-modal" style="display: none;">
    Launch demo modal
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thank you</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="window.location.href = '../index.php'">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Thank you for your payment!</p>
          <p>Please check out "Enrolled course" view your course detail!</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="window.location.href = '../enrolledCourse.php'">Go</button>
        </div>
      </div>
    </div>
  </div>

  <?php
    if(isset($_SESSION["userid"])){
        $userid = $_SESSION["userid"];
        $username = $_SESSION["username"];
        $courseid = $_GET["courseid"];

        $result = mysqli_query($conn, "SELECT * FROM courseinfo WHERE courseId='$courseid'");
        $row = mysqli_fetch_assoc($result);

        $coursefee = $row["courseFee"];
        $coursename = $row["courseName"];

        print("
        <div class=\"container main\">
          <form id=\"payment-form\">
            <input type=\"hidden\" id=\"userid\" value=\"$userid\" name=\"userid\" />
            <input type=\"hidden\" id=\"userid\" value=\"$courseid\" name=\"courseid\" />
            <div class=\"form-group\">
              <label for=\"username\">Username</label>
              <input type=\"text\" class=\"form-control\" id=\"username\" disabled value=\"$username\">
            </div>
            <div class=\"form-group\">
              <label for=\"coursename\">Course to be enrolled</label>
              <input type=\"text\" class=\"form-control\" id=\"coursename\" disabled value=\"$coursename\">
            </div>
            <div class=\"form-group\">
              <label for=\"coursefee\">Amount to be paid</label>
              <input type=\"text\" class=\"form-control\" id=\"coursefee\" disabled value=\"$coursefee\">
            </div>
            <div id=\"paypal-button-container\"></div>

          </form>
        </div>
        ");

        print("
        <script>
          paypal.Buttons({
            createOrder: function(data, actions) {
              // This function sets up the details of the transaction, including the amount and line item details.
              return actions.order.create({
                purchase_units: [{
                  amount: {
                    value: document.querySelector(\"#coursefee\").value
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
                $(\"#success-modal\").click();
                save_record();
              });
            }
          }).render('#paypal-button-container');
          //This function displays Smart Payment Buttons on your web page.
        </script>
        ");
    }else{
        print("<div class=\"container\">");
        print('<h1 class="display-4">You must be one of our member to join any course!</h1>');
        print('<button type="button" class="btn btn-primary btn-lg login-redirect-btn">Go to Login page</button><br>');
        print('<button type="button" class="btn btn-primary btn-lg signup-redirect-btn">Go to Signup page</button>');
        print("</div>");
    }
    ?>
<!--     <div class="container main">
      <form>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" disabled>
        </div>
        <div class="form-group">
          <label for="coursename">Course to be enrolled</label>
          <input type="text" class="form-control" id="coursename" disabled>
        </div>
        <div class="form-group">
          <label for="coursefee">Amount to be paid</label>
          <input type="text" class="form-control" id="coursefee" disabled>
        </div>
        <button type="submit" class="btn btn-primary btn-block" onclick="process()">Pay</button>
      </form>
    </div> -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
    <script type="text/javascript" src="../jquery-3.4.1.min.js"></script>
    <script src="../script.js"></script>

    <script type="text/javascript">
      $(".login-redirect-btn").click(function(){
          window.location.href = "../login.html";
      });
      $(".signup-redirect-btn").click(function(){
          window.location.href = "../login.html";
      });
    </script>

    <script type="text/javascript">
      var coursefee = $("#coursefee").val();
      function process(){
        var aprvWin = window.open("approval.php?amt="+coursefee, "approvalWin", width="180", height="150");
      }

      function save_record(){
        $.ajax(
        {
            type: "POST",
            url: "saveBillRecord.php",
            data: $("#payment-form").serialize(), // serializes the form's elements.
            dataType: "json",
            success: function(response)
            {
                console.log("Output: " + response);

            }
        });
      }
    </script>
</body>

</html>