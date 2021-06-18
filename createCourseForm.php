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
        @media only screen and (max-width: 600px) {
          .createCourseForm {
            width: 100%;
          }
        }
    </style>
</head>

<body>
    <?php 
    session_start();
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
    <div class="container">
        <form class="createCourseForm" enctype="multipart/form-data" action="createCourse.php" method="POST">
            <h1>Create course</h1>
            <div class="form-group">
                <label for="courseName">Course name</label>
                <input type="text" class="form-control" id="courseName" name="courseName" placeholder="Input course name" required>
            </div>

            <div class="form-group">
                <label for="courseCategory">Course category</label>
                <select class="form-control" id="courseCategory" name="courseCategory">
                    <option value="Music" selected>Music</option>
                    <option value="Cookery">Cookery</option>
                    <option value="Pet">Pet</option>
                    <option value="Photography">Photography</option>
                    <option value="Language">Language</option>
                    <option value="Sport">Sport</option>
                    <option value="I.T.">I.T.</option>
                    <option value="other" id="otherCate">Other</option>
                </select>
            </div>

            <div class="form-group otherCate" style="display: none;">
                  <input type="text" class="form-control" id="otherCateValue" placeholder="Type your category here">
            </div>

            <div class="input-group mb-3">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="courseImageInput"
                  aria-describedby="courseImageInput" name="courseImage" accept=".jpg, .jpeg, .png" required>
                <label class="custom-file-label" for="inputGroupFile01" id="customImageLabel">Choose thumbnail</label>
              </div>
            </div>

            <div class="form-group">
                <label for="courseContent">Course description</label>
                <textarea class="form-control" id="courseContent" rows="5" name="courseContent" placeholder="What is your course about?" required></textarea>
            </div>

            <div class="form-group">
              <label for="courseFee">Course fee (USD)</label>
              <input class="form-control" type="number" value="" id="courseFee" name="courseFee" placeholder="Course fee you prefer?" required>
            </div>

            <div class="input-group mb-3">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="courseMaterialInput"
                  aria-describedby="courseMaterialInput" name="userfile" accept=".pdf,.mp4" required>
                <label class="custom-file-label" for="inputGroupFile01" id="customMaterialLabel">Teachering material (PDF/MP4 only)</label>
              </div>
            </div>

            <div class="form-group">
                <label for="skypeId">Skype ID (For interating with students</label>
                <input type="text" class="form-control" id="skypeId" name="skypeId" placeholder="Skype ID" required>
            </div>

            <!-- <input type="file" name="userfile" /> -->

            <div class="form-group row">
                <div class="col-sm-10">
                  <input type="submit" class="btn btn-primary" value="Create" name="submit" />
                </div>
            </div>

        </form>
    </div>

    <!-- Button trigger modal -->
    <button type="button" id="modalBtn" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="display: none;">
    </button>

    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"></h5>
          </div>
          <div class="modal-body">
            <p class="modal-body-content"></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="modalOkBtn">OK</button>
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
        $(".createCourseForm").submit(function(e){
            e.preventDefault();
            // var form = $(this);
            var fData = new FormData();
            fData.append('courseName', $('input[name=courseName').val());
            fData.append('courseCategory', $('select[name=courseCategory').val());
            fData.append('courseImage', $('input[name=courseImage]')[0].files[0]);
            fData.append('courseContent', $('textarea[name=courseContent').val());
            fData.append('courseFee', $('input[name=courseFee').val());
            fData.append('userfile', $('input[name=userfile]')[0].files[0]);
            fData.append('skypeId', $('input[name=skypeId').val());


        //     $.ajax({
        //         type: "POST",
        //         url: "createCourse.php",
        //         data: form.serialize(), // serializes the form's elements.
        //         dataType: "json",
        //         success: function(response)
        //         {
        //             console.log("Output: " + response);

        //             if (response["content"] == "Course created") {
        //                 $(".modal-title").text(response["content"]);
        //                 $(".modal-body-content").text("Your course has already been created. Please wait for others to enroll!");
        //                 $("#modalBtn").click();
        //             }

        //             if (response["content"] == "Error when creating course") {
        //                 $(".modal-title").text(response["content"]);
        //                 $(".modal-body-content").text("There maybe some error when creating your course. Please contact us for help!");
        //                 $("#modalBtn").click();
        //             }

        //         }
        //     });
        // });

        $.ajax({
                type: "POST",
                url: "createCourse.php",
                data: fData, // serializes the form's elements.
                dataType: "json",
                contentType: false,
                processData: false,
                encode: true,
                success: function(response)
                {
                    console.log("Output: " + response);

                    if (response["content"] == "Course created") {
                        $(".modal-title").text(response["content"]);
                        $(".modal-body-content").text("Your course has already been created. Please wait for others to enroll!");
                        $("#modalBtn").click();
                    }

                    if (response["content"] == "Error when creating course") {
                        $(".modal-title").text(response["content"]);
                        $(".modal-body-content").text("There maybe some error when creating your course. Please contact us for help!");
                        $("#modalBtn").click();
                    }

                }
            });
        });

        $("#modalOkBtn").click(function(){
            window.location = "./index.php";
        });
    </script>

    <script>
        $('#courseImageInput').on('change',function(){
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('#customImageLabel').html(fileName);
        });

        $('#courseMaterialInput').on('change',function(){
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('#customMaterialLabel').html(fileName);
        });

        document.body.addEventListener('dragover', function(e){
          e.preventDefault();
          e.stopPropagation();
        }, false);
        document.body.addEventListener('drop', function(e){
          e.preventDefault();
          e.stopPropagation();
        }, false);
    </script>


</body>

</html>