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
    <meta charset="UTF-8">
    <title>Pay with BrainTree</title>
    
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- braintree -->
    <script src="https://js.braintreegateway.com/js/braintree-2.31.0.min.js"></script>
    
    <!-- setting up braintree -->
    <script>
        $.ajax({
            url: "token.php",
            type: "get",
            dataType: "json",
            success: function (data) {
                    braintree.setup(data,'dropin', { container: 'dropin-container'});
            }
        })
    </script>

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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body style="text-align: center; margin-top: 100px;">
    <?php
    if(isset($_SESSION["userid"])){
        $userid = $_SESSION["userid"];
        $username = $_SESSION["username"];
        $courseid = $_GET["courseid"];

        $result = mysqli_query($conn, "SELECT courseFee FROM courseinfo WHERE courseId='$courseid'");
        $row = mysqli_fetch_row($result);

        $coursefee = $row[0];

        print("
        <form action=\"payment.php\" method=\"post\" class=\"payment-form\">
            <label for=\"firstName\" class=\"heading\">First Name</label><br>
            <input type=\"text\" name=\"firstName\" id=\"firstName\"><br><br>

            <label for=\"lastName\" class=\"heading\">Last Name</label><br>
            <input type=\"text\" name=\"lastName\" id=\"lastName\"><br><br>

            <label for=\"amount\" class=\"heading\">Amount (HKD)</label><br>
            <input type=\"text\" name=\"amount\" id=\"amount\" value=\"$coursefee\" disabled><br><br>

            <div id=\"dropin-container\"></div>
            <br><br>
            <button type=\"submit\">Pay with BrainTree</button>

        </form>
        ");


    }else{
        print('<h1 class="display-4">You must be one of our member to join any course!</h1>');
        print('<button type="button" class="btn btn-primary btn-lg login-redirect-btn">Go to Login page</button>');
    }
    ?>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    <script type="text/javascript">
        $(".login-redirect-btn").click(function(){
            window.location.href = "../login.html";
        });
    </script>
</body>
</html>