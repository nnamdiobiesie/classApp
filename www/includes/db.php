<?php

define('DBNAME', 'store');
define('DBUSER', 'root');
define('DBPASS', 'peterpan');

//TRY AND CATCH STATEMENT ENABLES YOU GET SPECIFIC ERROR MESSAGES.
try{
$conn = new PDO('mysql:host=localhost;dbname'.DBNAME, DBUSER, DPASS);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

}catch(PDOException $err) {


echo $err->getMessage();


}

?>