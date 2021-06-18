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

    <div class="container indexDiscover">
      <div class="row">
        <div class="col-12">
          <h3>Music</h3>
        </div>
      </div>
      <div class="row">
        <?php
        $result = mysqli_query($conn, "SELECT * FROM courseinfo WHERE courseCategory='Music'");
        if(!$result) die("SELECT ERROR");
        $num_rows = mysqli_num_rows($result);

        if ($num_rows > 0){
            while($row = mysqli_fetch_assoc($result)){
                $name = $row["courseName"];
                $category = $row["courseCategory"];
                $content = $row["courseContent"];
                $fee = $row["courseFee"];
                $createdid = $row["createdBy"];

                $teacherResult = mysqli_query($conn, "SELECT username FROM users WHERE userid=$createdid");
                $namerow = mysqli_fetch_row($teacherResult);
                $teacherName = $namerow[0];

                print('<div class="card" style="width: 18rem;">');
                    print('<div class="card-body">');
                        print("<h5 class=\"card-title\">$name</h5>");
                        print("<h6 class=\"card-subtitle mb-2 text-muted\">By $teacherName</h6>");
                        print("<p class=\"card-text\">$content</p>");
                        print("<p><span class=\"prefix\">Fee</span>: $fee HKD</p>");
                        print("<a href=\"\" class=\"btn btn-primary\">Enroll</a>");
                    print("</div>");
                print("</div>");
            }
        }
        ?>
      </div>
    </div>

    <hr>

    <div class="container indexDiscover">
      <div class="row">
        <div class="col-12">
          <h3>Cookery</h3>
        </div>
      </div>
      <div class="row">
        <?php
        $result = mysqli_query($conn, "SELECT * FROM courseinfo WHERE courseCategory='Cookery'");
        if(!$result) die("SELECT ERROR");
        $num_rows = mysqli_num_rows($result);

        if ($num_rows > 0){
            while($row = mysqli_fetch_assoc($result)){
                $name = $row["courseName"];
                $category = $row["courseCategory"];
                $content = $row["courseContent"];
                $fee = $row["courseFee"];
                $createdid = $row["createdBy"];

                $teacherResult = mysqli_query($conn, "SELECT username FROM users WHERE userid=$createdid");
                $namerow = mysqli_fetch_row($teacherResult);
                $teacherName = $namerow[0];

                print('<div class="card" style="width: 18rem;">');
                    print('<div class="card-body">');
                        print("<h5 class=\"card-title\">$name</h5>");
                        print("<h6 class=\"card-subtitle mb-2 text-muted\">By $teacherName</h6>");
                        print("<p class=\"card-text\">$content</p>");
                        print("<p><span class=\"prefix\">Fee</span>: $fee HKD</p>");
                        print("<a href=\"\" class=\"btn btn-primary\">Enroll</a>");
                    print("</div>");
                print("</div>");
            }
        }
        ?>
      </div>
    </div>

    <hr>

    <div class="container indexDiscover">
      <div class="row">
        <div class="col-12">
          <h3>Pet</h3>
        </div>
      </div>
      <div class="row">
        <?php
        $result = mysqli_query($conn, "SELECT * FROM courseinfo WHERE courseCategory='Pet'");
        if(!$result) die("SELECT ERROR");
        $num_rows = mysqli_num_rows($result);

        if ($num_rows > 0){
            while($row = mysqli_fetch_assoc($result)){
                $name = $row["courseName"];
                $category = $row["courseCategory"];
                $content = $row["courseContent"];
                $fee = $row["courseFee"];
                $createdid = $row["createdBy"];

                $teacherResult = mysqli_query($conn, "SELECT username FROM users WHERE userid=$createdid");
                $namerow = mysqli_fetch_row($teacherResult);
                $teacherName = $namerow[0];

                print('<div class="card" style="width: 18rem;">');
                    print('<div class="card-body">');
                        print("<h5 class=\"card-title\">$name</h5>");
                        print("<h6 class=\"card-subtitle mb-2 text-muted\">By $teacherName</h6>");
                        print("<p class=\"card-text\">$content</p>");
                        print("<p><span class=\"prefix\">Fee</span>: $fee HKD</p>");
                        print("<a href=\"\" class=\"btn btn-primary\">Enroll</a>");
                    print("</div>");
                print("</div>");
            }
        }
        ?>
      </div>
    </div>

    <hr>

    <div class="container indexDiscover">
      <div class="row">
        <div class="col-12">
          <h3>Photography</h3>
        </div>
      </div>
      <div class="row">
        <?php
        $result = mysqli_query($conn, "SELECT * FROM courseinfo WHERE courseCategory='Photography'");
        if(!$result) die("SELECT ERROR");
        $num_rows = mysqli_num_rows($result);

        if ($num_rows > 0){
            while($row = mysqli_fetch_assoc($result)){
                $name = $row["courseName"];
                $category = $row["courseCategory"];
                $content = $row["courseContent"];
                $fee = $row["courseFee"];
                $createdid = $row["createdBy"];

                $teacherResult = mysqli_query($conn, "SELECT username FROM users WHERE userid=$createdid");
                $namerow = mysqli_fetch_row($teacherResult);
                $teacherName = $namerow[0];

                print('<div class="card" style="width: 18rem;">');
                    print('<div class="card-body">');
                        print("<h5 class=\"card-title\">$name</h5>");
                        print("<h6 class=\"card-subtitle mb-2 text-muted\">By $teacherName</h6>");
                        print("<p class=\"card-text\">$content</p>");
                        print("<p><span class=\"prefix\">Fee</span>: $fee HKD</p>");
                        print("<a href=\"\" class=\"btn btn-primary\">Enroll</a>");
                    print("</div>");
                print("</div>");
            }
        }
        ?>
      </div>
    </div>

    <hr>

    <div class="container indexDiscover">
      <div class="row">
        <div class="col-12">
          <h3>Language</h3>
        </div>
      </div>
      <div class="row">
        <?php
        $result = mysqli_query($conn, "SELECT * FROM courseinfo WHERE courseCategory='Language'");
        if(!$result) die("SELECT ERROR");
        $num_rows = mysqli_num_rows($result);

        if ($num_rows > 0){
            while($row = mysqli_fetch_assoc($result)){
                $name = $row["courseName"];
                $category = $row["courseCategory"];
                $content = $row["courseContent"];
                $fee = $row["courseFee"];
                $createdid = $row["createdBy"];

                $teacherResult = mysqli_query($conn, "SELECT username FROM users WHERE userid=$createdid");
                $namerow = mysqli_fetch_row($teacherResult);
                $teacherName = $namerow[0];

                print('<div class="card" style="width: 18rem;">');
                    print('<div class="card-body">');
                        print("<h5 class=\"card-title\">$name</h5>");
                        print("<h6 class=\"card-subtitle mb-2 text-muted\">By $teacherName</h6>");
                        print("<p class=\"card-text\">$content</p>");
                        print("<p><span class=\"prefix\">Fee</span>: $fee HKD</p>");
                        print("<a href=\"\" class=\"btn btn-primary\">Enroll</a>");
                    print("</div>");
                print("</div>");
            }
        }
        ?>
      </div>
    </div>

    <hr>

    <div class="container indexDiscover">
      <div class="row">
        <div class="col-12">
          <h3>Sport</h3>
        </div>
      </div>
      <div class="row">
        <?php
        $result = mysqli_query($conn, "SELECT * FROM courseinfo WHERE courseCategory='Sport'");
        if(!$result) die("SELECT ERROR");
        $num_rows = mysqli_num_rows($result);

        if ($num_rows > 0){
            while($row = mysqli_fetch_assoc($result)){
                $name = $row["courseName"];
                $category = $row["courseCategory"];
                $content = $row["courseContent"];
                $fee = $row["courseFee"];
                $createdid = $row["createdBy"];

                $teacherResult = mysqli_query($conn, "SELECT username FROM users WHERE userid=$createdid");
                $namerow = mysqli_fetch_row($teacherResult);
                $teacherName = $namerow[0];

                print('<div class="card" style="width: 18rem;">');
                    print('<div class="card-body">');
                        print("<h5 class=\"card-title\">$name</h5>");
                        print("<h6 class=\"card-subtitle mb-2 text-muted\">By $teacherName</h6>");
                        print("<p class=\"card-text\">$content</p>");
                        print("<p><span class=\"prefix\">Fee</span>: $fee HKD</p>");
                        print("<a href=\"\" class=\"btn btn-primary\">Enroll</a>");
                    print("</div>");
                print("</div>");
            }
        }
        ?>
      </div>
    </div>

    <hr>

    <div class="container indexDiscover">
      <div class="row">
        <div class="col-12">
          <h3>I.T.</h3>
        </div>
      </div>
      <div class="row">
        <?php
        $result = mysqli_query($conn, "SELECT * FROM courseinfo WHERE courseCategory='I.T.'");
        if(!$result) die("SELECT ERROR");
        $num_rows = mysqli_num_rows($result);

        if ($num_rows > 0){
            while($row = mysqli_fetch_assoc($result)){
                $name = $row["courseName"];
                $category = $row["courseCategory"];
                $content = $row["courseContent"];
                $fee = $row["courseFee"];
                $createdid = $row["createdBy"];

                $teacherResult = mysqli_query($conn, "SELECT username FROM users WHERE userid=$createdid");
                $namerow = mysqli_fetch_row($teacherResult);
                $teacherName = $namerow[0];

                print('<div class="card" style="width: 18rem;">');
                    print('<div class="card-body">');
                        print("<h5 class=\"card-title\">$name</h5>");
                        print("<h6 class=\"card-subtitle mb-2 text-muted\">By $teacherName</h6>");
                        print("<p class=\"card-text\">$content</p>");
                        print("<p><span class=\"prefix\">Fee</span>: $fee HKD</p>");
                        print("<a href=\"\" class=\"btn btn-primary\">Enroll</a>");
                    print("</div>");
                print("</div>");
            }
        }
        ?>
      </div>
    </div>

    <hr>

    <div class="container indexDiscover">
      <div class="row">
        <div class="col-12">
          <h3>Other</h3>
        </div>
      </div>
      <div class="row">
        <?php
        $result = mysqli_query($conn, "SELECT * FROM courseinfo WHERE courseCategory NOT IN ('Music', 'Cookery', 'Pet', 'Photography', 'Language', 'Sport', 'I.T.')");
        if(!$result) die("SELECT ERROR");
        $num_rows = mysqli_num_rows($result);

        if ($num_rows > 0){
            while($row = mysqli_fetch_assoc($result)){
                $name = $row["courseName"];
                $category = $row["courseCategory"];
                $content = $row["courseContent"];
                $fee = $row["courseFee"];
                $createdid = $row["createdBy"];

                $teacherResult = mysqli_query($conn, "SELECT username FROM users WHERE userid=$createdid");
                $namerow = mysqli_fetch_row($teacherResult);
                $teacherName = $namerow[0];

                print('<div class="card" style="width: 18rem;">');
                    print('<div class="card-body">');
                        print("<h5 class=\"card-title\">$name</h5>");
                        print("<h6 class=\"card-subtitle mb-2 text-muted\">By $teacherName</h6>");
                        print("<p class=\"card-text\">$content</p>");
                        print("<p><span class=\"prefix\">Fee</span>: $fee HKD</p>");
                        print("<a href=\"\" class=\"btn btn-primary\">Enroll</a>");
                    print("</div>");
                print("</div>");
            }
        }
        ?>
      </div>
    </div>


<!--         <div class="row row-cols-1 row-cols-md-2">
          <div class="col mb-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              </div>
            </div>
          </div>
        </div>         -->

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