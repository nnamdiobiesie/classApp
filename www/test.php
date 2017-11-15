<?php

				define('MAX_FILE_SIZE', '2097152')
			if(array_key_exists('save', $_POST)) {

						//print_r($_FILES);

				$errors = [];

				if(empty($_POST['pics']['name'])) {

							$error[] = "Please select a file";

				}

						if($_POST['pics']['size'] > MAX_FILE_SIZE){


							$error[] = "File too large. Maximum:  ".MAX_FILE_SIZE;
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