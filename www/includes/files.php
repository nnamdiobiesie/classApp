<?php

function uploadFile ($files, $name, $loc){

			$result= [];

			$rnd = rand(000000000, 9999999999);
			$strip_name = str_replace(' ','_', $files[$name]['name']);

			$fileName = $rnd.$strip_name;
			$destination = $loc.$fileName;

			if(move_uploaded_file($files[$name]['tmp_name'], $destination))

			{

						$result[] = true;
			}else {
				$result[] = false;


			}

				return $result;



}



function doAdminRegister($dbconn, $input){

		$hash = password_hash($input['password'], PASSWORD_BCRYPT);

		$stmt = $dbconn->prepare("INSERT INTO admin(first_name, last_name, email, hash)
									VALUES(:f, :l, :e, :h)");


			$data = [

					":f" => $input['fname'],
					":l" => $input['lname'],
					":e" => $input['email'],
					":h" => $hash



			];


			$stmt->execute($data);





}





?>