<?php                                                                                          
$servername = "localhost";
$dbusername = "coachingAdmin";
$dbpassword = "admin3105";
$dbname = "coachingdb";

$db = MYSQLi_CONNECT($servername,$dbusername,$dbpassword) OR DIE ("Bye Bye");
mysqli_select_db($db,"$dbname") OR DIE ("Bye bye bye");
$courseid = $_GET["courseid"];
$result = mysqli_query ($db,"select courseImage from courseinfo
                         where courseId = \"$courseid\" ") ;
if (!$result) die ("Cannot select record from archive.<br>\n");
if ( MYSQLi_NUM_ROWS( $result ) < 1 )
 { die ("File was not check in.<br>\n") ; }
$row = MYSQLi_FETCH_ROW( $result ) ;
$image =  $row[0];
header('Content-type: image/jpeg');
print ( $image );
?>
