<?php
session_start();
session_destroy();
header("location:ad_homepage.php");
?>