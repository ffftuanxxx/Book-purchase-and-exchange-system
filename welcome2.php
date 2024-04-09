<?php session_start() ?>
<p>Welcome <?php echo $_SESSION["username"] ?></p>
<?php $usernamewel = $_SESSION["username"] ?>
<p>User Profile:</p>
<p>uid: <?php echo $_SESSION["uid"] ?> !</p>
<p>email: <?php echo $_SESSION["email"] ?> !</p>
<p>address: <?php echo $_SESSION["address"] ?> !</p>
<p>favor: <?php echo $_SESSION["favor"] ?> !</p>
<?php
include 'connect_db.php';
$sql = "SELECT * FROM bookuser WHERE username='$usernamewel'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
 $head = $row['head'];
echo "<image src=./image/$head width='50px' height='50px'>";
?>
<html>
    <button onclick="location.href='homepage.php'">GO TO homepage</button>
</html>
