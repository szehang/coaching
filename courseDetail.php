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
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Self-defined External CSS -->
    <link rel="stylesheet" href="./style.css">

    <title>E-commerce</title>

    <style type="text/css">
    	.pdfViewer{
/*    		width: 75%;
    		left: 15%;*/
    		display: none;
            border: 1px solid black;
    	}

    	#skypeAlert{
    		padding: 10px;
    		background-color: #00AFF0;
    		border-radius: 25px;
    		color: white;
    		font-weight: bold;
    	}
    </style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./availableCourse.php">Course</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./contactUs.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./aboutus.php">About us</a>
                </li>
            </ul>
        </div>
        <div class="mx-auto order-0">
            <img src="./images/logo.png" alt="">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <?php
            if (isset($_SESSION["userid"])){ // if logined
                if($_SESSION["usertype"] == 1){
                    $username = $_SESSION["username"];
                    print('<div class="navbar-collapse collapse w-100 order-3 dual-collapse2">');
                    print('<ul class="navbar-nav ml-auto">');
                    print('<li class="nav-item active dropdown">');
                        print('<a class="nav-link dropdown-toggle" href="" id="teacherDropDownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hi, ' . "$username</a>");
                        print('
                            <div class="dropdown-menu" aria-labelledby="teacherDropDownMenu">
                              <h6 class="dropdown-header">Your courses</h6>
                              <a class="dropdown-item" href="createdCourses.php">Created courses</a>
                              <a class="dropdown-item" href="enrolledCourse.php">Enrolled courses</a>
                              <hr>
                              <h6 class="dropdown-header">Other actions</h6>
                              <a class="dropdown-item" href="availableCourse.php">Available courses</a>
                              <a class="dropdown-item" href="createCourseForm.php">Create your course</a>
                            </div>
                        ');
                    print('</li>');
                    print('<li class="nav-item active">');
                    print('<a class="nav-link" href="logout.php" id="logoutBtn">Logout</a>');
                    print('</li>');
                    print('</ul>');
                    print('</div>');                    
                }else{
                    $username = $_SESSION["username"];
                    print('<div class="navbar-collapse collapse w-100 order-3 dual-collapse2">');
                    print('<ul class="navbar-nav ml-auto">');
                    print('<li class="nav-item active dropdown">');
                        print('<a class="nav-link dropdown-toggle" href="" id="teacherDropDownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hi, ' . "$username</a>");
                        print('
                            <div class="dropdown-menu" aria-labelledby="teacherDropDownMenu">
                              <h6 class="dropdown-header">Your courses</h6>
                              <a class="dropdown-item" href="enrolledCourse.php">Enrolled courses</a>
                              <hr>
                              <h6 class="dropdown-header">Other actions</h6>
                              <a class="dropdown-item" href="availableCourse.php">Available courses</a>
                            </div>
                        ');
                    print('</li>');
                    print('<li class="nav-item active">');
                    print('<a class="nav-link" href="logout.php" id="logoutBtn">Logout</a>');
                    print('</li>');
                    print('</ul>');
                    print('</div>');  
                }

            }else{
                print('
                    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                    <a class="nav-link" href="./login.html">Login</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="./signup.html">Sign up</a>
                    </li>
                    </ul>
                    </div>');
            }
            ?>
    </nav>
    <?php
	if (isset($_GET["courseid"]) && isset($_SESSION["userid"])){


		$courseid = $_GET["courseid"];
		$userid = $_SESSION["userid"];

		$result = mysqli_query($conn, "SELECT * FROM bill WHERE studentId='$userid' AND courseId='$courseid'");
		$num_rows = mysqli_num_rows($result);
		if ($num_rows >= 1){
			$result = mysqli_query($conn, "SELECT * FROM courseinfo WHERE courseId='$courseid'");
			$row = mysqli_fetch_assoc($result);

			$name = $row["courseName"];
			$category = $row["courseCategory"];
			$content = $row["courseContent"];
			$createdby = $row["createdBy"];
            $skypdid = $row["skypeId"];

			$result = mysqli_query($conn, "SELECT username from users WHERE userid='$createdby'");
			$row = mysqli_fetch_assoc($result);

			$teachername = $row["username"];

			print('<div class="container">');
				print("<h1 class=\"my-4\">$name</h1>");
				print('<div class="row">');
					print('<div class="col-md-5">');
						print("<img class=\"img-fluid\" src=\"showpic.php?courseid=$courseid\" alt=\"Image Error\" width=\"400\">");
					print('</div>');

					print('<div class="col-md-7">');
						print("<h3 class=\"my-3\">Description</h3>");
						print("<p>$content</p>");

						print("<h3 class=\"my-3\">Category</h3>");
						print("<p>$category</p>");

						print("<h3 class=\"my-3\">Teacher</h3>");
						print("<p>$teachername</p>");

						print("<button type=\"button\" class=\"btn btn-dark pdfBtn mb-3\">Open PDF</button><br>");
						// print("<span id=\"skypeAlert\">For Skype communication, please click the chat bubble at right-bottom corner</span>");
						// print("<span class=\"skype-button rounded\" data-contact-id=\"vitotai1997\" id=\"skypeBtn\"></span>");
						print("<div class=\"skype-button bubble\" data-contact-id=\"$skypdid\"></div>");
					print('</div>');
				print("</div>");
			print("</div>");

			$result = mysqli_query($conn, "SELECT materialPath FROM coursematerials WHERE courseId='$courseid'");
			$row = mysqli_fetch_row($result);
			$path = $row[0];

			print("<div id=\"pdfViewer\" class=\"embed-responsive embed-responsive-16by9 pdfViewer col-xs-12 text-center mt-4\">");
				print("<iframe class=\"embed-responsive-item\" src=\"./courseMaterial/$path\" allowfullscreen></iframe>");
			print("</div>");
		}else{
			print("<p>You don't have permission.</p>");
			print("<h1 class=\"display-4\">You will redirected to Main Page</h1>");
			header("refresh:3;url=index.php");
		}
	}else{
		print("<p>Error occured. Sorry</p>");
		print("<h1 class=\"display-4\">You will redirected to Main Page</h1>");
		header("refresh:3;url=index.php");
	}
	?>

    

    <!-- <script src="https://latest-swc.cdn.skype.com/sdk/v1/sdk.min.js"></script> -->
    <script src="https://latest-swc.cdn.skype.com/sdk/v1/sdk.min.js"></script>
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
    <script type="text/javascript" src="./jquery-3.4.1.min.js"></script>
    <script src="./script.js"></script>

    <script type="text/javascript">
    	$(".pdfBtn").click(function(){
    		if ($("#pdfViewer").css("display") == "none") {
    			$("#pdfViewer").css("display", "block");
    			$(".pdfBtn").text("Close PDF");
    		}else{
    			$("#pdfViewer").css("display", "none");
    			$(".pdfBtn").text("Open PDF");
    		}
    	});
    </script>

</body>
</html>
