<?php

				define('MAX_FILE_SIZE', '2097152');
				$ext = ['image/jpg', 'image/jpeg', 'image/png'];
			if(array_key_exists('save', $_POST)) {

						//print_r($_FILES);

				$errors = [];

				if(empty($_FILES['pics']['name'])) {

							$error[] = "Please select a file";

				}

						if($_FILES['pics']['size'] > MAX_FILE_SIZE){


							$error[] = "File too large. Maximum:  ".MAX_FILE_SIZE;
							$_FILES['pics']['tmp_name'] = null;
						}

						//IN_ARRAY CHECKS TO SEE IF THE VALUES SAVED IN THE EXT ARRAY, if it EXISTS IN THAT ARRAY.
						if(!in_array($_FILES['pics']['type'],$ext)){
							$error[] = "File format not supported";
							$_FILES['pics']['tmp_name'] = null;


						}

						$rnd = rand(0000000000, 9999999999); //THIS GENERATES RANDOM 10 NUMBERS
						$strip_name = str_replace(' ','_',$_FILES['pics']['name']);

						$filename = $rnd.$strip_name; //ThIS TIES EACH FILE UPLOADED BY THE USER TO A RANDOM NUMBER
						$destination = './uploads/'.$filename;


						IF(!move_uploaded_file($_FILES['pics']['tmp_name'],$destination)){

							$errors[] = "File not uploaded";

						}

					if(empty($error)){

						echo  "File upload successful";

					}else {


						foreach ($error as $err){

								echo $err.'</br>';

						}
					}


			}


?>




<form id="register" method="POST", enctype="multipart/form-data">
		<p> Please upload a picture </p>
		<input type="file" name="pics">


		<input type="submit" name="save">


	</form>