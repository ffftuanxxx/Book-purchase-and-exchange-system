<?php
$servername = "db.bcrab.cn";
$usernamead = "r130026083";
$password 	= "liaojiecheng5386";
$db = "r130026083_bookadmin";
$connad = new mysqli($servername, $usernamead, $password, $db);
if (!$connad) {
	die("Connection failed: " . mysqli_connect_error());
}
?>