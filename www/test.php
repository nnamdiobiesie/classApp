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
						}

						//IN_ARRAY CHECKS TO SEE IF THE VALUES SAVED IN THE EXT ARRAY, if it EXISTS IN THAT ARRAY.
						if(!in_array($_FILES['pics']['type'],$ext)){
							$error[] = "File format not supported";



						}

						$rnd = rand(0000000000, 9999999999);

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