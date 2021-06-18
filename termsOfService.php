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

    <div class="jumbotron jumbotron-fluid" style="background-color: #E0FFFF">
      <div class="container">
        <h1 class="display-3">Terms of Service</h1>
      </div>
    </div>

    <div class="container-fluid" style="width: 80%; padding: 30px;">
      <div class="row">
        <div class="col-12">
<!--           <h1 class="display-6">Condition of Use</h1>

          <p>The general Terms and Conditions of Sale detailed below govern the contractual relationship between the ‘User’ (hereafter also referred to as ‘You’ or the ‘Customer’) and 'Coaching' (hereafter also referred to as ‘We’ or the ‘Website’), belonging to the company Coaching, company number 0123, VAT no Coaching VAT. Both parties accept these Conditions unreservedly. These general Conditions of Sale are the only conditions that are applicable and replace all other conditions, except in the case of express. written, prior dispensation. We maintain that, by confirming your order, you have read and do unreservedly accept our general Conditions of Sale. These Terms and Conditions of Sale are important to you and Coaching as they are used to protect your rights as a valued customer and our rights as a business.</p> -->

          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-eng-tab" data-toggle="pill" href="#pills-eng" role="tab" aria-controls="pills-eng" aria-selected="true">English</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-triChi-tab" data-toggle="pill" href="#pills-triChi" role="tab" aria-controls="pills-triChi" aria-selected="false">Traditional Chinese</a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-eng" role="tabpanel" aria-labelledby="pills-eng-tab">
              <h1 class="display-6">Condition of Use</h1>

              <p>The general Terms and Conditions of Sale detailed below govern the contractual relationship between the ‘User’ (hereafter also referred to as ‘You’ or the ‘Customer’) and 'Coaching' (hereafter also referred to as ‘We’ or the ‘Website’), belonging to the company Coaching, company number 0123, VAT no Coaching VAT. Both parties accept these Conditions unreservedly. These general Conditions of Sale are the only conditions that are applicable and replace all other conditions, except in the case of express. written, prior dispensation. We maintain that, by confirming your order, you have read and do unreservedly accept our general Conditions of Sale. These Terms and Conditions of Sale are important to you and Coaching as they are used to protect your rights as a valued customer and our rights as a business.</p>

              <h1 class="display-6">I. Scope of privacy protection policy</h1>

              <p>The privacy protection policy includes how this website handles personally identifiable information collected when you use the website services. The privacy protection policy does not apply to related linked sites other than this site, nor does it apply to persons not commissioned or involved in the management of this site.</p>

              <h1 class="display-6">II. Privacy Policy (Collection, processing and utilization of personal data)</h1>

              <p>When you visit this website or use the functional services provided by this website, we will depend on the nature of the service functions, ask you to provide the necessary personal data, and to process and use your personal data within this specific purpose; without your permission, it is agreed in writing that this website will not use personal data for other purposes.
              </p>
              <p>
              When you use interactive features such as service mailboxes and questionnaires on this website, your name, email address, contact information, and time of use will be retained.
              </p>
              <p>
              During normal browsing, the server will record related behaviors, including the IP address of the connected device, the time of use, the browser used, browsing and clicking data records, etc., as a reference for us to improve our website services. This record is for internal use and will never be made public.
              </p>
              <p>
              To provide accurate services, we will collect and analyze the content of the questionnaire surveys, and present the statistical data or explanatory text of the analysis results. In addition to internal research, we will publish statistical data and explanatory texts as needed, but not specific Personal information.
              </p>

              <h1 class="display-6">III. Protection of data</h1>

              <p>The host of this website is equipped with various information security equipment and necessary security protection measures, such as firewalls and anti-virus systems. To protect the website and your personal data, strict protection measures are adopted. Only authorized personnel can access your personal information. The data and relevant processing personnel have signed a confidentiality contract. Anyone who violates the obligation of confidentiality will be subject to relevant legal sanctions.
              </p>
              <p>
              If it is necessary to entrust other units to provide services due to business needs, this website will also strictly require them to comply with confidentiality obligations and take necessary inspection procedures to determine that they will indeed comply.
              </p>

              <h1 class="display-6">IV. External links of the website</h1>

              <p>The pages on this website provide links to other websites. You can also click on the links provided on this website to enter other websites. However, the linked site's privacy protection policy is not applicable. You must refer to the privacy protection policy of the linked site.
              </p>

              <h1 class="display-6">V. Policy for sharing personal data with third parties</h1>

              <p>This website will never provide, exchange, rent or sell any of your personal data to other individuals, groups, private enterprises or public agencies, but it has no legal basis or contractual obligations.
              </p>
              <p>
              The proviso of the preceding paragraph includes, but is not limited to:
              </p>
              <p>
              With your written consent.
              </p>
              <p>
              Expressly provided by law.
              </p>
              <p>
              To avoid danger to your life, body, freedom or property.
              </p>
              <p>
              In cooperation with public authorities or academic research institutions, it is necessary for statistical or academic research based on the public interest, and the data is processed or collected by the provider, and the specific parties cannot be identified by the method of disclosure.
              </p>
              <p>
              When your behavior on the website violates the terms of service or may damage or obstruct the rights of the website and other users or cause damage to anyone, the website management unit analyzes and exposes your personal data to identify, contact or take legal action. Necessary.
              </p>
              <p>
              Good for your rights.
              </p>
              <p>
              When this website entrusts manufacturers to assist in collecting, processing or using your personal data, it will be responsible for supervising and managing the outsourced manufacturers or individuals.
              </p>

              <h1 class="display-6">VI. Use of Cookies</h1>

              <p>To provide you with the best service, this website will place and access our cookies on your computer. If you do not want to accept the writing of cookies, you can set the privacy level to High, you can reject the writing of cookies, but may cause some functions of the website to not work properly.
              </p>

              <h1 class="display-6">VI. Amendments to the privacy protection policy</h1>

              <p>This website's privacy protection policy will be amended at any time as needed, and the revised terms will be posted on the website.
              </p>



            </div>
            <div class="tab-pane fade" id="pills-triChi" role="tabpanel" aria-labelledby="pills-triChi-tab">
              <h1 class="display-6">服務條款</h1>

              <p>非常歡迎您光臨「Coaching」（以下簡稱本網站），為了讓您能夠安心使用本網站的各項服務與資訊，特此向您說明本網站的隱私權保護政策，以保障您的權益，請您詳閱下列內容：</p>

              <h1 class="display-6">一、 隱私權保護政策的適用範圍</h1>

              <p>隱私權保護政策內容，包括本網站如何處理在您使用網站服務時收集到的個人識別資料。隱私權保護政策不適用於本網站以外的相關連結網站，也不適用於非本網站所委託或參與管理的人員。</p>

              <h1 class="display-6">二、 個人資料的蒐集、處理及利用方式</h1>

              <p>當您造訪本網站或使用本網站所提供之功能服務時，我們將視該服務功能性質，請您提供必要的個人資料，並在該特定目的範圍內處理及利用您的個人資料；非經您書面同意，本網站不會將個人資料用於其他用途。
              </p>
              <p>
              本網站在您使用服務信箱、問卷調查等互動性功能時，會保留您所提供的姓名、電子郵件地址、聯絡方式及使用時間等。
              </p>
              <p>
              於一般瀏覽時，伺服器會自行記錄相關行徑，包括您使用連線設備的IP位址、使用時間、使用的瀏覽器、瀏覽及點選資料記錄等，做為我們增進網站服務的參考依據，此記錄為內部應用，決不對外公佈。
              </p>
              <p>
              為提供精確的服務，我們會將收集的問卷調查內容進行統計與分析，分析結果之統計數據或說明文字呈現，除供內部研究外，我們會視需要公佈統計數據及說明文字，但不涉及特定個人之資料。
              </p>

              <h1 class="display-6">三、 資料之保護</h1>

              <p>本網站主機均設有防火牆、防毒系統等相關的各項資訊安全設備及必要的安全防護措施，加以保護網站及您的個人資料採用嚴格的保護措施，只由經過授權的人員才能接觸您的個人資料，相關處理人員皆簽有保密合約，如有違反保密義務者，將會受到相關的法律處分。
              </p>
              <p>
              如因業務需要有必要委託其他單位提供服務時，本網站亦會嚴格要求其遵守保密義務，並且採取必要檢查程序以確定其將確實遵守。
              </p>

              <h1 class="display-6">四、 網站對外的相關連結</h1>

              <p>本網站的網頁提供其他網站的網路連結，您也可經由本網站所提供的連結，點選進入其他網站。但該連結網站不適用本網站的隱私權保護政策，您必須參考該連結網站中的隱私權保護政策。
              </p>

              <h1 class="display-6">五、 與第三人共用個人資料之政策</h1>

              <p>本網站絕不會提供、交換、出租或出售任何您的個人資料給其他個人、團體、私人企業或公務機關，但有法律依據或合約義務者，不在此限。
              </p>
              <p>
              前項但書之情形包括不限於：
              </p>
              <p>
              經由您書面同意。
              </p>
              <p>
              法律明文規定。
              </p>
              <p>
              為免除您生命、身體、自由或財產上之危險。
              </p>
              <p>
              與公務機關或學術研究機構合作，基於公共利益為統計或學術研究而有必要，且資料經過提供者處理或蒐集著依其揭露方式無從識別特定之當事人。
              </p>
              <p>
              當您在網站的行為，違反服務條款或可能損害或妨礙網站與其他使用者權益或導致任何人遭受損害時，經網站管理單位研析揭露您的個人資料是為了辨識、聯絡或採取法律行動所必要者。
              </p>
              <p>
              有利於您的權益。
              </p>
              <p>
              本網站委託廠商協助蒐集、處理或利用您的個人資料時，將對委外廠商或個人善盡監督管理之責。
              </p>

              <h1 class="display-6">六、 Cookie之使用</h1>

              <p>為了提供您最佳的服務，本網站會在您的電腦中放置並取用我們的Cookie，若您不願接受Cookie的寫入，您可在您使用的瀏覽器功能項中設定隱私權等級為高，即可拒絕Cookie的寫入，但可能會導至網站某些功能無法正常執行 。
              </p>

              <h1 class="display-6">七、 隱私權保護政策之修正</h1>

              <p>本網站隱私權保護政策將因應需求隨時進行修正，修正後的條款將刊登於網站上。
              </p>
            </div>
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
</body>

</html>