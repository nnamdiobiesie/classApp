<?php

define('DBNAME', 'store');
define('DBUSER', 'root');
define('DBPASS', 'peterpan');


try{
$conn = new PDO('mysql:host=localhost;dbname'.DBNAME, DBUSER, DPASS);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

}catch(PDOException $err) {


echo $err->getMessage();


}

?>