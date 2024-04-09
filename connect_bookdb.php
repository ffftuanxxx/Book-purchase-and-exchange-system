<?php
$servername = "db.bcrab.cn";
$usernameb 	= "r130026083";
$password 	= "liaojiecheng5386";
$db = "r130026083_books";
$conn2 = new mysqli($servername, $usernameb, $password, $db);
if (!$conn2) {
	die("Connection failed: " . mysqli_connect_error());
}
?>