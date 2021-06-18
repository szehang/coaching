<?php 
session_start();
// header("Content-type:application/json;charset=utf-8");

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

$courseName = $_POST["courseName"];
$courseContent = $_POST["courseContent"];
$courseCage = $_POST["courseCategory"];
$courseFee = $_POST["courseFee"] + 0.0;
$skypeId = $_POST["skypeId"];
$createdBy = $_SESSION["userid"] + 0;
$fileName;

if($_FILES['userfile']){
	$phpFileUploadErrors = array(
		0 => 'There is no error, the file uploaded with success',
		1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
		2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specifed in the HTML form',
		3 => 'The uploaded file was only partially uploaded',
		4 => 'No file was uploaded',
		6 => 'Missing a temporary folder',
		7 => 'Failed to write file to disk.',
		8 => 'A PHP extension stopped the file uploaded.',
	);

	// pre_r($_FILES);

	$ext_error = false;
	$extensions = array('pdf');
	$file_ext = explode('.', $_FILES['userfile']['name'])[1];

	// pre_r($file_ext);

	// if(!in_array($file_ext, $extensions)){
	// 	$ext_error = true;
	// }

	// if($_FILES['userfile']['name']){
	// 	echo $phpFileUploadErrors[$_FILES['userfile']['error']];
	// }
	// elseif ($ext_error){
	// 	echo "Invaid file extension!";
	// }
	// else {
	// 	echo "Success! The image has been uploaded!";
	// }

	//Change the file name and do some checking with mySQL
	$fileName = $createdBy . "_" . $courseName . ".$file_ext";
	$_FILES['userfile']['name'] = $fileName;

	//upload pdf
	move_uploaded_file($_FILES['userfile']['tmp_name'], 'courseMaterial/' . $_FILES['userfile']['name']);

}
function pre_r($array){
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}

if($_FILES["courseImage"]){
	$imagetmp = addslashes(file_get_contents($_FILES['courseImage']['tmp_name']));
}

$sql = "INSERT INTO courseinfo (courseName, courseCategory, courseContent, courseFee, createdBy, courseImage, skypeId) VALUES ('$courseName', '$courseCage', '$courseContent', $courseFee, $createdBy, '$imagetmp', '$skypeId')";

mysqli_query($conn, $sql);

$result = mysqli_query($conn, "SELECT courseId FROM courseinfo WHERE courseName='$courseName'");
$row = mysqli_fetch_row($result);
$courseid = $row[0];

$sql = "INSERT INTO coursematerials VALUES ($courseid, \"$fileName\")";

if (mysqli_query($conn, $sql) === TRUE){
    $data["response"] = "success";
    $data["content"] = "Course created";
}else{
	// echo(mysqli_error($conn));
    $data["response"] = "error";
    $data["content"] = "Error when creating course";
}

echo json_encode($data);
?>