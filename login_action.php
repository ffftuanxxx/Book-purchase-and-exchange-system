<?php
session_start();
include 'connect_db.php';
$uname = $_POST["unamein"];
$passwd = $_POST["passwdin"];
$sql = "SELECT * FROM bookuser WHERE username='$uname'";
$resultin = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($resultin);
if($row['password'] == $passwd && $uname!='' && $passwd != ''){
    $_SESSION["ID"] = $row["ID"];
    $_SESSION["login"] = true;
    $_SESSION["uid"] = 1;
    $_SESSION["username"] = $row["username"];
    $_SESSION["email"] = $row["email"];
    $_SESSION["address"] = $row["address"];
    $_SESSION["favor"] = $row["favor"];
    $_SESSION["head"] = $row["head"];
    $urlmain = "welcome.php";
    $_SESSION["password"] = $row["password"];
    header("location:".$urlmain);
}
else{
    header("location:throw_error_wrongnameorpassw.php");
}

?>