<?php
$insert = false;
$update = false;
$delete = false;

$sname= "localhost";
$unmae= "root";
$password = "";
$db_name = "crud";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}
?>