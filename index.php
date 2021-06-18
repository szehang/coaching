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

    <style type="text/css">
      .img-fluid{
        max-height: inherit;
      }
      .carouselSpan{
        padding: 30px;
        text-align: center;
      }

      @media only screen and (max-width: 600px) {
          .carouseHeader{
            font-size: initial;
          }
        }
    </style>
</head>

<body>
    <?php 
    session_start();
    ?>

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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
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

    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./images/carousel3.png" class="d-block w-100" alt="Image Error">
        </div>
        <div class="carousel-item">
          <img src="./images/carousel1.png" class="d-block w-100" alt="Image Error">
        </div>
        <div class="carousel-item">
          <img src="./images/carousel2.png" class="d-block w-100" alt="Image Error">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <div class="container" id="indexDiscover">
      <div class="row">
        <div class="col-12">
          <h3>Discover more</h3>
        </div>
        <div class="col">
          <p></p>
        </div>
      </div>
      <div class="row">
        <div class="col discoverContent">
            <a href="./availableCourse.php" class="discoverAnchor">
              <img src="./images/join_courses.png" class="rounded-circle" width="150" height="150">
              <p class="discoverTitle">Join Courses</p>
            </a>
        </div>

        <?php
            if (!isset($_SESSION["usertype"])){
                print('
                <div class="col discoverContent">
                    <a href="./signup.html" class="discoverAnchor">
                      <img src="./images/become_a_teacher.png" class="rounded-circle" width="150" height="150">
                      <p class="discoverTitle">Become a Teacher</p>
                    </a>
                </div>
                ');
            }elseif ($_SESSION["usertype"] == 1){
                print('
                <div class="col discoverContent">
                    <a href="./createCourseForm.php" class="discoverAnchor">
                      <img src="./images/create_course.png" class="rounded-circle" width="150" height="150">
                      <p class="discoverTitle">Create courses</p>
                    </a>
                </div>
                ');
            }
        ?>
        <div class="col discoverContent">
            <a href="./aboutus.php" class="discoverAnchor">
              <img src="./images/about_coaching.png" class="rounded-circle" width="150" height="150">
              <p class="discoverTitle">About Coaching</p>
            </a>
        </div>
        <div class="col discoverContent">
            <a href="./contactUs.php" class="discoverAnchor">
              <img src="./images/customer_service.png" class="rounded-circle" width="150" height="150">
              <p class="discoverTitle">Customer Service</p>
            </a>
        </div>
        <div class="col discoverContent">
            <a href="./termsOfService.php" class="discoverAnchor">
              <img src="./images/terms_of_service.png" class="rounded-circle" width="150" height="150">
              <p class="discoverTitle">Terms of Service</p>
            </a>
        </div>

      </div>
<!--       <div class="row">
        <div class="col discoverContent">
          <h4>Enroll course</h4>
        </div>
        <div class="col discoverContent">
          <h4>Become a teacher</h4>
        </div>
        <div class="col discoverContent">
          <h4>Know more first</h4>
        </div>
      </div> -->
    </div>

    <hr>
    <div class="container">
      <h2>Popular classes</h2>
    </div>

    <?php
    $result = mysqli_query($conn, "SELECT courseId, COUNT(*) as frequency FROM bill GROUP BY courseId LIMIT 3");
    $frequency = array();
    while ($row = mysqli_fetch_assoc($result)) {
      array_push($frequency, $row["courseId"]);
    }
    $first = $frequency[0];
    $second = $frequency[1];
    $third = $frequency[2];
    ?>

    <div class="d-flex justify-content-center">
      <figure class="icon-cards mt-3">
        <div class="icon-cards__content">
          <div class="icon-cards__item d-flex align-items-center justify-content-center">
              <?php
                $result = mysqli_query($conn, "SELECT * FROM courseinfo WHERE courseId='$first'");
                $row = mysqli_fetch_assoc($result);

                $name = $row["courseName"];
                $cate = $row["courseCategory"];

                // print("<h5 class='align-middle popularName'>$name</h5>");
                print("<span class=\"h1 carouselSpan align-middle\">");
                print("<h1 class=\"carouseHeader\">$name</h1>");
                print("<a class=\"btn btn-success btn-block\" href=\"paypal_checkout/payout.php?courseid=$first\" role=\"button\">Check out</a>");
                print("</span>");
              ?>
          </div>

          <div class="icon-cards__item d-flex align-items-center justify-content-center">
              <?php
                $result = mysqli_query($conn, "SELECT * FROM courseinfo WHERE courseId='$second'");
                $row = mysqli_fetch_assoc($result);

                $name = $row["courseName"];
                $cate = $row["courseCategory"];

                print("<span class=\"h1 carouselSpan align-middle\">");
                print("<h1 class=\"carouseHeader\">$name</h1>");
                print("<a class=\"btn btn-success btn-block\" href=\"paypal_checkout/payout.php?courseid=$second\" role=\"button\">Check out</a>");
                print("</span>");
              ?>
          </div>

          <div class="icon-cards__item d-flex align-items-center justify-content-center">
            <?php
                $result = mysqli_query($conn, "SELECT * FROM courseinfo WHERE courseId='$third'");
                $row = mysqli_fetch_assoc($result);

                $name = $row["courseName"];
                $cate = $row["courseCategory"];

                print("<span class=\"h1 carouselSpan align-middle\">");
                print("<h1 class=\"carouseHeader\">$name</h1>");
                print("<a class=\"btn btn-success btn-block\" href=\"paypal_checkout/payout.php?courseid=$third\" role=\"button\">Check out</a>");
                print("</span>");
              ?>
          </div>
        </div>
      </figure>
    </div>

    <div class="checkbox" style="display: none;">
      <input class="d-none" id="toggle-animation" type="checkbox" checked />
      <label class="checkbox__checkbox" for="toggle-animation"></label>
      <label class="checkbox__label" for="toggle-animation">Toggle animation</label>
    </div>

    <hr>

    <div class="bg-white py-5">
      <div class="container py-5">
        <?php
        if (isset($_SESSION["usertype"])){
            $usertype = $_SESSION["usertype"];
            if ($usertype == 1){
                print('
                    <div class="row align-items-center mb-5 hideme">
                    <!-- First -->
                      <div class="col-lg-6 order-2 order-lg-1"><i class="fa fa-bar-chart fa-2x mb-3 text-primary"></i>
                        <h2 class="font-weight-light">Use your talent to inspire other people.</h2>
                        <h2 style="color: #ffc108;">"Never underestimate the influence you have on others."</h2>
                        <p class="lead text-muted mb-4">
                          As a teacher, not only you can join courses created by other teacher, but also you can create your own course for free.
                        </p>
                        <p class="lead text-muted mb-4">
                          Coaching offers you the greatest platform to share your talent to others. Your can also earn money from it! Take action now.
                        </p>
                        <a href="./createCourseForm.php" class="btn btn-light px-5 rounded-pill shadow-sm">Create your course</a>
                      </div>
                      <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="./images/knowledge.png" alt="" class="img-fluid mb-4 mb-lg-0"></div>
                    </div>
                    ');
            }
        }
    ?>
        
        <div class="row align-items-center hideme">
          <!-- Second -->
          <div class="col-lg-5 px-5 mx-auto"><img src="./images/learn.png" alt="" class="img-fluid mb-4 mb-lg-0"></div>
          <div class="col-lg-6"><i class="fa fa-leaf fa-2x mb-3 text-primary"></i>
            <h2 class="font-weight-light">Do you think you are enough with knowledge?</h2>
            <h2 style="color: #055ab5;">"It is never too old to learn."</h2>
            <p class="lead text-muted mb-4">
              No matter you are student or teacher account. You can always enroll into course.
            </p>
            <p class="lead text-muted mb-4">
              With simple payment, you can enjoy great lessons remain within doors.
            </p>
            <a href="./availableCourse.php" class="btn btn-light px-5 rounded-pill shadow-sm">Check out our courses</a>
          </div>
        </div>
      </div>
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
      document.querySelector('#toggle-animation').addEventListener('click', classToggle);
    </script>
</body>

</html>