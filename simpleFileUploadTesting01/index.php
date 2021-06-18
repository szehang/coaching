<html>
	<head>
		<title>
			PHP File Upload
		</title>
		<body>

			<?php
				if(isset($_FILES['userfile'])){

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
					$extensions = array('jpg', 'jpeg', 'gif', 'png');
					$file_ext = explode('.', $_FILES['userfile']['name']);

					// pre_r($file_ext);

					if(!in_array($file_ext, $extensions)){
						$ext_error = true;
					}

					if($_FILES['userfile']['name']){
						echo $phpFileUploadErrors[$_FILES['userfile']['error']];
					}
					elseif ($ext_error){
						echo "Invaid file extension!";
					}
					else {
						echo "Success! The image has been uploaded!";
					}

					//Change the file name and do some checking with mySQL
					$_FILES['userfile']['name'] = "temp01.pdf";

					//upload pdf
					move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploadItems/' . $_FILES['userfile']['name']);
				}
				function pre_r($array){
					echo '<pre>';
					print_r($array);
					echo '</pre>';
				}
			?>

			<form action"" method="POST" enctype="multipart/form-data">
				<input type="file" name="userfile" />
				<input type="submit" value="Upload" />
			</form>
		</body>
	</head>
</html>