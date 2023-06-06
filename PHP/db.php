<?php
$sname= "localhost";
$unmae= "root";
$password = "simon";

$db_name = "etudiant";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);


if (!$conn) {
	echo "Connection failed!";
}

?>