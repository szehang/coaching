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

$userid = $_POST["userid"];
$courseid = $_POST["courseid"];

$sql = "SELECT createdBy FROM courseinfo WHERE courseId='$courseid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);

$teacherid = $row[0];

$result = mysqli_query($conn, "INSERT INTO bill (courseId, teacherId, studentId) VALUES ($courseid, $teacherid, $userid)");

if($result == TRUE){ // No such record
    $data["response"] = "success";
    $data["content"] = "Inserted";
}else{
    $data["response"] = "error";
    $data["content"] = "Insert error";
}

echo json_encode($data);
?>