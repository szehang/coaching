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

    <style>
        #skypeBtn {
            background-color: #00AFF0;
            border: 1px solid #00AFF0;
            box-shadow: 0px 0px 10px 0px #000;
            border-radius: 25px;
            padding: 5px 10px;
            font-weight: bold;
            color: #FFF;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .card{
            margin: 20px;
        }

        body{
            background-color: #36096d;
            background-image: linear-gradient(315deg, #36096d 0%, #37d5d6 50%);
        }

        @media only screen and (max-width: 600px) {
          .classImg, .ml-3 {
            width: 100%;
            margin: 0;
          }

          #navbar-example2{
            position: absolute;
            top: -500px;
          }
        }

        .scroll-spy-bar{
            position: sticky;
            top: 77px;
            z-index: 2;
            display: none;
        }

    </style>



    <title>E-commerce</title>
</head>

<body>
    <?php 
    session_start();
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php">Home</a>
                </li>
                <li class="nav-item active">
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
<!--         <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./login.html">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./signup.html">Sign up</a>
                </li>
            </ul>
        </div> -->
    </nav>

    <nav id="navbar-example2" class="navbar navbar-light bg-light d-flex justify-content-around scroll-spy-bar">
      <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link" href="#music">#Music</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#cookery">#Cookery</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#pet">#Pet</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#photography">#Photography</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#language">#Language</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#sport">#Sport</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#it">#I.T.</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#others">#Others</a>
        </li>
      </ul>
    </nav>

<!--     <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Available course</h1>
        <p class="lead">All of your created course will be shown here</p>
      </div>
    </div> -->
    <?php
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

    <div class="container py-5" id="music">
        <div class="row text-center text-white mb-2">
            <div class="col-lg-7 mx-auto">
                <h1 class="display-4">Music</h1>
            </div>
        </div>

        <?php
        $result = mysqli_query($conn, "SELECT * FROM courseinfo WHERE courseCategory='Music'");
        if(!$result) die("SELECT ERROR");
        $num_rows = mysqli_num_rows($result);

        if ($num_rows > 0){
            while($row = mysqli_fetch_assoc($result)){
                $courseid = $row["courseId"];
                $name = $row["courseName"];
                $category = $row["courseCategory"];
                $content = $row["courseContent"];
                $fee = $row["courseFee"];
                $createdid = $row["createdBy"];

                $teacherResult = mysqli_query($conn, "SELECT username FROM users WHERE userid=$createdid");
                $namerow = mysqli_fetch_row($teacherResult);
                $teacherName = $namerow[0];

                print("
                <div class=\"row\">
                    <div class=\"col-lg-12 mx-auto\">
                        <!-- List group-->
                        <ul class=\"list-group shadow\">
                            <!-- list group item-->
                            <li class=\"list-group-item\">
                                <!-- Custom content-->
                                <div class=\"media align-items-lg-center flex-column flex-lg-row p-3\">
                                    <div class=\"media-body order-2 order-lg-1\">
                                        <h3 class=\"mt-0 font-weight-bold mb-2\">$name</h3>
                                        <p class=\"font-italic text-muted mb-2 large\">By $teacherName</p>
                                        <p class=\"mb-0 large\">$content</p>
                                        <div class=\"d-flex align-items-center justify-content-between mt-1\">
                                            <h6 class=\"font-weight-bold my-2\">USD $fee</h6>
                                        </div>
                                        <button type=\"button\" class=\"btn btn-success btn-lg enroll-btn\" id=\"$courseid\">Enroll</button>
                                    </div><img src=\"showpic.php?courseid=$courseid\" width=\"350\" class=\"classImg ml-3 order-1 order-lg-2\" alt=\"Later\">
                                </div> <!-- End -->
                            </li> <!-- End -->
                        </ul> <!-- End -->
                    </div>
                </div>
                ");
            }
        }
        ?>
    </div>

    <hr>

    <div class="container py-5" id="cookery">
        <div class="row text-center text-white mb-2">
            <div class="col-lg-7 mx-auto">
                <h1 class="display-4">Cookery</h1>
            </div>
        </div>

        <?php
        $result = mysqli_query($conn, "SELECT * FROM courseinfo WHERE courseCategory='Cookery'");
        if(!$result) die("SELECT ERROR");
        $num_rows = mysqli_num_rows($result);

        if ($num_rows > 0){
            while($row = mysqli_fetch_assoc($result)){
                $courseid = $row["courseId"];
                $name = $row["courseName"];
                $category = $row["courseCategory"];
                $content = $row["courseContent"];
                $fee = $row["courseFee"];
                $createdid = $row["createdBy"];

                $teacherResult = mysqli_query($conn, "SELECT username FROM users WHERE userid=$createdid");
                $namerow = mysqli_fetch_row($teacherResult);
                $teacherName = $namerow[0];

                print("
                <div class=\"row\">
                    <div class=\"col-lg-12 mx-auto\">
                        <!-- List group-->
                        <ul class=\"list-group shadow\">
                            <!-- list group item-->
                            <li class=\"list-group-item\">
                                <!-- Custom content-->
                                <div class=\"media align-items-lg-center flex-column flex-lg-row p-3\">
                                    <div class=\"media-body order-2 order-lg-1\">
                                        <h3 class=\"mt-0 font-weight-bold mb-2\">$name</h3>
                                        <p class=\"font-italic text-muted mb-2 large\">By $teacherName</p>
                                        <p class=\"mb-0 large\">$content</p>
                                        <div class=\"d-flex align-items-center justify-content-between mt-1\">
                                            <h6 class=\"font-weight-bold my-2\">HKD $fee</h6>
                                        </div>
                                        <button type=\"button\" class=\"btn btn-success btn-lg enroll-btn\" id=\"$courseid\">Enroll</button>
                                    </div><img src=\"showpic.php?courseid=$courseid\" width=\"350\" class=\"classImg ml-3 order-1 order-lg-2\" alt=\"Later\">
                                </div> <!-- End -->
                            </li> <!-- End -->
                        </ul> <!-- End -->
                    </div>
                </div>
                ");
            }
        }
        ?>
    </div>

    <hr>

    <div class="container py-5" id="pet">
        <div class="row text-center text-white mb-2">
            <div class="col-lg-7 mx-auto">
                <h1 class="display-4">Pet</h1>
            </div>
        </div>

        <?php
        $result = mysqli_query($conn, "SELECT * FROM courseinfo WHERE courseCategory='Pet'");
        if(!$result) die("SELECT ERROR");
        $num_rows = mysqli_num_rows($result);

        if ($num_rows > 0){
            while($row = mysqli_fetch_assoc($result)){
                $courseid = $row["courseId"];
                $name = $row["courseName"];
                $category = $row["courseCategory"];
                $content = $row["courseContent"];
                $fee = $row["courseFee"];
                $createdid = $row["createdBy"];

                $teacherResult = mysqli_query($conn, "SELECT username FROM users WHERE userid=$createdid");
                $namerow = mysqli_fetch_row($teacherResult);
                $teacherName = $namerow[0];

                print("
                <div class=\"row\">
                    <div class=\"col-lg-12 mx-auto\">
                        <!-- List group-->
                        <ul class=\"list-group shadow\">
                            <!-- list group item-->
                            <li class=\"list-group-item\">
                                <!-- Custom content-->
                                <div class=\"media align-items-lg-center flex-column flex-lg-row p-3\">
                                    <div class=\"media-body order-2 order-lg-1\">
                                        <h3 class=\"mt-0 font-weight-bold mb-2\">$name</h3>
                                        <p class=\"font-italic text-muted mb-2 large\">By $teacherName</p>
                                        <p class=\"mb-0 large\">$content</p>
                                        <div class=\"d-flex align-items-center justify-content-between mt-1\">
                                            <h6 class=\"font-weight-bold my-2\">HKD $fee</h6>
                                        </div>
                                        <button type=\"button\" class=\"btn btn-success btn-lg enroll-btn\" id=\"$courseid\">Enroll</button>
                                    </div><img src=\"showpic.php?courseid=$courseid\" width=\"350\" class=\"classImg ml-3 order-1 order-lg-2\" alt=\"Later\">
                                </div> <!-- End -->
                            </li> <!-- End -->
                        </ul> <!-- End -->
                    </div>
                </div>
                ");
            }
        }
        ?>
    </div>

    <hr>

    <div class="container py-5" id="photography">
        <div class="row text-center text-white mb-2">
            <div class="col-lg-7 mx-auto">
                <h1 class="display-4">Photography</h1>
            </div>
        </div>

        <?php
        $result = mysqli_query($conn, "SELECT * FROM courseinfo WHERE courseCategory='Photography'");
        if(!$result) die("SELECT ERROR");
        $num_rows = mysqli_num_rows($result);

        if ($num_rows > 0){
            while($row = mysqli_fetch_assoc($result)){
                $courseid = $row["courseId"];
                $name = $row["courseName"];
                $category = $row["courseCategory"];
                $content = $row["courseContent"];
                $fee = $row["courseFee"];
                $createdid = $row["createdBy"];

                $teacherResult = mysqli_query($conn, "SELECT username FROM users WHERE userid=$createdid");
                $namerow = mysqli_fetch_row($teacherResult);
                $teacherName = $namerow[0];

                print("
                <div class=\"row\">
                    <div class=\"col-lg-12 mx-auto\">
                        <!-- List group-->
                        <ul class=\"list-group shadow\">
                            <!-- list group item-->
                            <li class=\"list-group-item\">
                                <!-- Custom content-->
                                <div class=\"media align-items-lg-center flex-column flex-lg-row p-3\">
                                    <div class=\"media-body order-2 order-lg-1\">
                                        <h3 class=\"mt-0 font-weight-bold mb-2\">$name</h3>
                                        <p class=\"font-italic text-muted mb-2 large\">By $teacherName</p>
                                        <p class=\"mb-0 large\">$content</p>
                                        <div class=\"d-flex align-items-center justify-content-between mt-1\">
                                            <h6 class=\"font-weight-bold my-2\">HKD $fee</h6>
                                        </div>
                                        <button type=\"button\" class=\"btn btn-success btn-lg enroll-btn\" id=\"$courseid\">Enroll</button>
                                    </div><img src=\"showpic.php?courseid=$courseid\" width=\"350\" class=\"classImg ml-3 order-1 order-lg-2\" alt=\"Later\">
                                </div> <!-- End -->
                            </li> <!-- End -->
                        </ul> <!-- End -->
                    </div>
                </div>
                ");
            }
        }
        ?>
    </div>

    <hr>

    <div class="container py-5" id="language">
        <div class="row text-center text-white mb-2">
            <div class="col-lg-7 mx-auto">
                <h1 class="display-4">Language</h1>
            </div>
        </div>

        <?php
        $result = mysqli_query($conn, "SELECT * FROM courseinfo WHERE courseCategory='Language'");
        if(!$result) die("SELECT ERROR");
        $num_rows = mysqli_num_rows($result);

        if ($num_rows > 0){
            while($row = mysqli_fetch_assoc($result)){
                $courseid = $row["courseId"];
                $name = $row["courseName"];
                $category = $row["courseCategory"];
                $content = $row["courseContent"];
                $fee = $row["courseFee"];
                $createdid = $row["createdBy"];

                $teacherResult = mysqli_query($conn, "SELECT username FROM users WHERE userid=$createdid");
                $namerow = mysqli_fetch_row($teacherResult);
                $teacherName = $namerow[0];

                print("
                <div class=\"row\">
                    <div class=\"col-lg-12 mx-auto\">
                        <!-- List group-->
                        <ul class=\"list-group shadow\">
                            <!-- list group item-->
                            <li class=\"list-group-item\">
                                <!-- Custom content-->
                                <div class=\"media align-items-lg-center flex-column flex-lg-row p-3\">
                                    <div class=\"media-body order-2 order-lg-1\">
                                        <h3 class=\"mt-0 font-weight-bold mb-2\">$name</h3>
                                        <p class=\"font-italic text-muted mb-2 large\">By $teacherName</p>
                                        <p class=\"mb-0 large\">$content</p>
                                        <div class=\"d-flex align-items-center justify-content-between mt-1\">
                                            <h6 class=\"font-weight-bold my-2\">HKD $fee</h6>
                                        </div>
                                        <button type=\"button\" class=\"btn btn-success btn-lg enroll-btn\" id=\"$courseid\">Enroll</button>
                                    </div><img src=\"showpic.php?courseid=$courseid\" width=\"350\" class=\"classImg ml-3 order-1 order-lg-2\" alt=\"Later\">
                                </div> <!-- End -->
                            </li> <!-- End -->
                        </ul> <!-- End -->
                    </div>
                </div>
                ");
            }
        }
        ?>
    </div>

    <hr>

    <div class="container py-5" id="sport">
        <div class="row text-center text-white mb-2">
            <div class="col-lg-7 mx-auto">
                <h1 class="display-4">Sport</h1>
            </div>
        </div>

        <?php
        $result = mysqli_query($conn, "SELECT * FROM courseinfo WHERE courseCategory='Sport'");
        if(!$result) die("SELECT ERROR");
        $num_rows = mysqli_num_rows($result);

        if ($num_rows > 0){
            while($row = mysqli_fetch_assoc($result)){
                $courseid = $row["courseId"];
                $name = $row["courseName"];
                $category = $row["courseCategory"];
                $content = $row["courseContent"];
                $fee = $row["courseFee"];
                $createdid = $row["createdBy"];

                $teacherResult = mysqli_query($conn, "SELECT username FROM users WHERE userid=$createdid");
                $namerow = mysqli_fetch_row($teacherResult);
                $teacherName = $namerow[0];

                print("
                <div class=\"row\">
                    <div class=\"col-lg-12 mx-auto\">
                        <!-- List group-->
                        <ul class=\"list-group shadow\">
                            <!-- list group item-->
                            <li class=\"list-group-item\">
                                <!-- Custom content-->
                                <div class=\"media align-items-lg-center flex-column flex-lg-row p-3\">
                                    <div class=\"media-body order-2 order-lg-1\">
                                        <h3 class=\"mt-0 font-weight-bold mb-2\">$name</h3>
                                        <p class=\"font-italic text-muted mb-2 large\">By $teacherName</p>
                                        <p class=\"mb-0 large\">$content</p>
                                        <div class=\"d-flex align-items-center justify-content-between mt-1\">
                                            <h6 class=\"font-weight-bold my-2\">HKD $fee</h6>
                                        </div>
                                        <button type=\"button\" class=\"btn btn-success btn-lg enroll-btn\" id=\"$courseid\">Enroll</button>
                                    </div><img src=\"showpic.php?courseid=$courseid\" width=\"350\" class=\"classImg ml-3 order-1 order-lg-2\" alt=\"Later\">
                                </div> <!-- End -->
                            </li> <!-- End -->
                        </ul> <!-- End -->
                    </div>
                </div>
                ");
            }
        }
        ?>
    </div>

    <hr>

    <div class="container py-5" id="it">
        <div class="row text-center text-white mb-2">
            <div class="col-lg-7 mx-auto">
                <h1 class="display-4">I.T.</h1>
            </div>
        </div>

        <?php
        $result = mysqli_query($conn, "SELECT * FROM courseinfo WHERE courseCategory='I.T.'");
        if(!$result) die("SELECT ERROR");
        $num_rows = mysqli_num_rows($result);

        if ($num_rows > 0){
            while($row = mysqli_fetch_assoc($result)){
                $courseid = $row["courseId"];
                $name = $row["courseName"];
                $category = $row["courseCategory"];
                $content = $row["courseContent"];
                $fee = $row["courseFee"];
                $createdid = $row["createdBy"];

                $teacherResult = mysqli_query($conn, "SELECT username FROM users WHERE userid=$createdid");
                $namerow = mysqli_fetch_row($teacherResult);
                $teacherName = $namerow[0];

                print("
                <div class=\"row\">
                    <div class=\"col-lg-12 mx-auto\">
                        <!-- List group-->
                        <ul class=\"list-group shadow\">
                            <!-- list group item-->
                            <li class=\"list-group-item\">
                                <!-- Custom content-->
                                <div class=\"media align-items-lg-center flex-column flex-lg-row p-3\">
                                    <div class=\"media-body order-2 order-lg-1\">
                                        <h3 class=\"mt-0 font-weight-bold mb-2\">$name</h3>
                                        <p class=\"font-italic text-muted mb-2 large\">By $teacherName</p>
                                        <p class=\"mb-0 large\">$content</p>
                                        <div class=\"d-flex align-items-center justify-content-between mt-1\">
                                            <h6 class=\"font-weight-bold my-2\">HKD $fee</h6>
                                        </div>
                                        <button type=\"button\" class=\"btn btn-success btn-lg enroll-btn\" id=\"$courseid\">Enroll</button>
                                    </div><img src=\"showpic.php?courseid=$courseid\" width=\"350\" class=\"classImg ml-3 order-1 order-lg-2\" alt=\"Later\">
                                </div> <!-- End -->
                            </li> <!-- End -->
                        </ul> <!-- End -->
                    </div>
                </div>
                ");
            }
        }
        ?>
    </div>

    <hr>

    <div class="container py-5" id="others">
        <div class="row text-center text-white mb-2">
            <div class="col-lg-7 mx-auto">
                <h1 class="display-4">Others</h1>
            </div>
        </div>

        <?php
        $result = mysqli_query($conn, "SELECT * FROM courseinfo WHERE courseCategory NOT IN ('Music', 'Cookery', 'Pet', 'Photography', 'Language', 'Sport', 'I.T.')");
        if(!$result) die("SELECT ERROR");
        $num_rows = mysqli_num_rows($result);

        if ($num_rows > 0){
            while($row = mysqli_fetch_assoc($result)){
                $courseid = $row["courseId"];
                $name = $row["courseName"];
                $category = $row["courseCategory"];
                $content = $row["courseContent"];
                $fee = $row["courseFee"];
                $createdid = $row["createdBy"];

                $teacherResult = mysqli_query($conn, "SELECT username FROM users WHERE userid=$createdid");
                $namerow = mysqli_fetch_row($teacherResult);
                $teacherName = $namerow[0];

                print("
                <div class=\"row\">
                    <div class=\"col-lg-12 mx-auto\">
                        <!-- List group-->
                        <ul class=\"list-group shadow\">
                            <!-- list group item-->
                            <li class=\"list-group-item\">
                                <!-- Custom content-->
                                <div class=\"media align-items-lg-center flex-column flex-lg-row p-3\">
                                    <div class=\"media-body order-2 order-lg-1\">
                                        <h3 class=\"mt-0 font-weight-bold mb-2\">$name</h3>
                                        <p class=\"font-italic text-muted mb-2 large\">By $teacherName</p>
                                        <p class=\"mb-0 large\">$content</p>
                                        <div class=\"d-flex align-items-center justify-content-between mt-1\">
                                            <h6 class=\"font-weight-bold my-2\">HKD $fee</h6>
                                        </div>
                                        <button type=\"button\" class=\"btn btn-success btn-lg enroll-btn\" id=\"$courseid\">Enroll</button>
                                    </div><img src=\"showpic.php?courseid=$courseid\" width=\"350\" class=\"classImg ml-3 order-1 order-lg-2\" alt=\"Later\">
                                </div> <!-- End -->
                            </li> <!-- End -->
                        </ul> <!-- End -->
                    </div>
                </div>
                ");
            }
        }
        ?>
    </div>

    <!-- Footer -->
    <footer class="page-footer font-small text-white bg-dark pt-4">

      <!-- Footer Links -->
      <div class="container text-center text-md-left">

        <!-- Footer links -->
        <div class="row text-center text-md-left mt-3 pb-3">

          <!-- Grid column -->
          <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Coaching</h6>
            <p>Coaching is a platform for everyone, in everywhere, at anytime, to learn and to teach.</p>
          </div>
          <!-- Grid column -->

          <hr class="w-100 clearfix d-md-none">

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Useful links</h6>
            <p>
              <a href="./availableCourse.php">Available Courses</a>
            </p>
            <p>
              <a href="./aboutus.php">About us</a>
            </p>
            <p>
              <a href="./contactUs.php">Help</a>
            </p>
          </div>

          <!-- Grid column -->
          <hr class="w-100 clearfix d-md-none">

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
            <p>
              203 ABC Building, Sha Tin, N.T.</p>
            <p>
              </i> dummy@gmail.com</p>
            <p>
              </i>+852 9999-8888</p>
          </div>
          <!-- Grid column -->

        </div>
        <!-- Footer links -->

        <hr>

        <!-- Grid row -->
        <div class="row d-flex align-items-center">

          <!-- Grid column -->
          <div class="col-md-7 col-lg-8">

            <!--Copyright-->
            <p class="text-center text-md-left">© 2020 Copyright:
              <a href="https://lamszehang.com/coaching/">
                <strong>lamszehang.com/coaching</strong>
              </a>
            </p>

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row -->

      </div>
      <!-- Footer Links -->

    </footer>
    <!-- Footer --> 

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
        $(window).ready(function(){
         if($(window).width()<=600){
          $('img').removeClass('ml-3');
         }
        });
    </script>

    <script type="text/javascript">
        $(".enroll-btn").click(function(){
            var courseId = $(this).attr("id");

            window.location.href = "paypal_checkout/payout.php?courseid="+courseId;
        });
    </script>
</body>

</html>