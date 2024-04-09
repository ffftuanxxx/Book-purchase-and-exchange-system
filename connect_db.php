<?php
$servername = "db.bcrab.cn";
$usernameu 	= "r130026083";
$password 	= "liaojiecheng5386";
$db = "r130026083_bookuser";
$conn = new mysqli($servername, $usernameu, $password, $db);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
?>