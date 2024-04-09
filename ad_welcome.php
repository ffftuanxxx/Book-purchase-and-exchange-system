<html>
<link rel="stylesheet" href="ad_welcome.css">
<?php 
session_start();
if(isset($_SESSION["adname"]) && isset($_SESSION["adpassword"]) && $_SESSION["adname"] && $_SESSION["adpassword"]){
?>
<h1 style="top:40px; left:660px; position:absolute;">Welcome Administrator!</h1>
<div class="p">
<p style="font-size: 25px; top:250px; left:700px; position:absolute;">
<?php
echo "admin: ".$_SESSION["adname"]."<br><br>";
echo "Password: ".$_SESSION['adpassword']."<br>";
?>
<br><a font-size: 20px; href="ad_homepage.php"> Go to Homepage</a>
</p>
</div>
</body>
</html>
<?php 
}else{
    header("location:ad_login.php");
}
?>