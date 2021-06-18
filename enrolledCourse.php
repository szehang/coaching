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
    <link rel="stylesheet" href="./style.css">

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

    <div class="jumbotron text-center hoverable p-4" style="background-color: #FFE1A3;">

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-4 offset-md-1 mx-3 my-3">

          <!-- Featured image -->
          <div class="view overlay">
            <img src="https://teachable.com/assets/five-steps/step1-3fd2c54b7e72864447f8592b46ffed7927760eeb11ca09a77b9b3a7426a76b29.svg" class="img-fluid" alt="Sample image for first version of blog listing" width="400">
            <a>
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-7 text-md-left ml-3 mt-3">

          <!-- Excerpt -->

          <h1 class="display-4 mb-5">Enrolled Courses</h1>

          <p class="h2 mb-2 ">
              All of you enrolled courses will be shown below
          </p>

          <p class="h4 mb-5">
              Press "Detail" button to view the course detail
          </p>

          <a class="btn btn-success btn-lg" href="availableCourse.php">Join More Courses</a>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- News jumbotron -->

    <div class="table-responsive-sm h5">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col" class="thumbnail">Thumbnail</th>
              <th scope="col">Category</th>
              <th scope="col">Name</th>
              <th scope="col">Teacher</th>
              <th scope="col">Date & Time</th>
              <th scope="col">Detail</th>
            </tr>
          </thead>
          <tbody>
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

            $studentid = $_SESSION["userid"];

            $result = mysqli_query($conn, "SELECT * FROM bill WHERE studentId='$studentid'");
            if(!$result) die("SELECT error");
            $num_rows = mysqli_num_rows($result);
            $count = 1;

            if($num_rows == 0){
                print("<div class=\"container\" style=\"width: 80%;\">");
                print("<h1 class=\"display-6\">You don't have any course enrolled. Go join one!</p>");
                print("<a href=\"./availableCourse.php\" class=\"btn btn-primary\">Create course</a>");
                print("</div>");
            }else{
                while($row = mysqli_fetch_assoc($result)){
                    $courseid = $row["courseId"];
                    $teacherid = $row["teacherId"];
                    $billtime = $row["billDateNTime"];

                    $result1 = mysqli_query($conn, "SELECT courseCategory, courseName, courseImage from courseinfo WHERE courseId='$courseid'");
                    $row1 = mysqli_fetch_assoc($result1);

                    $cate = $row1["courseCategory"];
                    $name = $row1["courseName"];
                    $img = $row1["courseImage"];

                    $result2 = mysqli_query($conn, "SELECT username from users WHERE userid='$teacherid'");
                    $row2 = mysqli_fetch_assoc($result2);
                    $teachername = $row2["username"];

                    print("<tr>");
                        print("<th scope=\"row\">$count</th>");
                        print("<td><img src=\"showpic.php?courseid=$courseid\" width=\"200\" class=\"align-middle thumbnail img-fluid\" /></td>");
                        print("<td class=\"align-middle\">$cate</td>");
                        print("<td class=\"align-middle\">$name</td>");
                        print("<td class=\"align-middle\">$teachername</td>");
                        print("<td class=\"align-middle\">$billtime</td>");
                        print("<td class=\"align-middle\"><a class=\"btn btn-dark\" href=\"courseDetail.php?courseid=$courseid\">Detail</a></td>");
                    print("</tr>");
                    $count = $count + 1;
                }
            }
            ?>
    <!--         <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr> -->
          </tbody>
        </table>
    </div>

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

</body>

</html>