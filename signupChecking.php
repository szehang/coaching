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
$pw1 = $_POST["password"];
$pw2 = $_POST["password2"];
if ($_POST["usertype"] == "student"){
	$usertype = 0;
}elseif ($_POST["usertype"] == "teacher"){
	$usertype = 1;
}

if($pw1 == $pw2){
	$sql = "SELECT * FROM users WHERE username='$username'";
	$result = mysqli_query($conn, $sql);

    	if(mysqli_num_rows($result) == 0){ // New record
    		$sql = "INSERT INTO users (username, userpw, usertype) VALUES ('$username', '$pw1', $usertype)";

    		if($conn->query($sql) === TRUE){
    			$data['response'] = "success";
    			$data['content'] = "New user record inserted";

    			$sql = "SELECT * FROM users WHERE username='$username'";
				$result2 = mysqli_query($conn, $sql);
    			$row = $result2->fetch_assoc();

    			$session_userid = $row['userid'];
    			$session_username = $row['username'];
    			$session_usertype = $row['usertype'];

    			$_SESSION["userid"] = $session_userid;
    			$_SESSION["username"] = $session_username;
    			$_SESSION["usertype"] = $session_usertype;

    		}else{
    			$data['response'] = "error";
    			$data['content'] = "Error when inserting record";
    		}
    	}else{ //Duplicate record
    		$data['response'] = "error";
    		$data['content'] = "Username already existed";
    	}
    }else{
    	$data['response'] = "error";
    	$data['content'] = "Password doesn't match";    	
    }

    echo json_encode($data);
    ?>