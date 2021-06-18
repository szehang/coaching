<?php 
session_start();
header("Content-type:application/json;charset=utf-8");

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

$username = $_POST["username"];
$pw = $_POST["password"];

$sql = "SELECT * FROM users WHERE username='$username' AND userpw='$pw'";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();

if(mysqli_num_rows($result) == 0){ // No such record
    $data["response"] = "error";
    $data["content"] = "Invalid username or password";
}else{
    $data["response"] = "success";
    $data["content"] = "Login success";

    $session_userid = $row['userid'];
    $session_username = $row['username'];
    $session_usertype = $row['usertype'];

    $_SESSION["userid"] = $session_userid;
    $_SESSION["username"] = $session_username;
    $_SESSION["usertype"] = $session_usertype;
}

echo json_encode($data);
?>