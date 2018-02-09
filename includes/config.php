<?php 
if(!isset($_SESSION)){
	session_start();
}
$server = "localhost";
$user = "root";
$pwd = "139262";
$db = "adhub";
$conn = mysqli_connect($server,$user,$pwd,$db);

?>