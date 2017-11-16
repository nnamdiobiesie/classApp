<?php

function uploadFile ($files, $name, $loc){

			$result= [];

			$rnd = rand(000000000, 9999999999);
			$strip_name = str_replace(' ','_', $files[$name]['name']);

			$fileName = $rnd.$strip_name;
			$destination = $loc.$fileName;

			move_uploaded_file($files[$name]['tmp_name'], $destination){

						$result[] = true;
			}else {
				$result[] = false;


			}

				return $result;



}





?>