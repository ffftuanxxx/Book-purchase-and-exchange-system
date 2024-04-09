<?php
session_start();
include 'connect_db.php';
include 'connect_bookdb.php';
if(isset($_SESSION["username"]) && isset($_SESSION["password"]) && $_SESSION["username"] && $_SESSION["password"]){
    $susername = $_SESSION["username"];
    $suserpassword = $_SESSION["password"];
$name = $_POST['usernamere'];
$Email = $_POST['Email'];
$Address = $_POST['Address'];
$password = $_POST['password'];
$sqlreset = "UPDATE bookuser SET `email` = '$Email', `address` = '$Address', `password` = '$password',`username` = '$name' WHERE username='$susername' AND password='$suserpassword' ";
mysqli_query($conn,$sqlreset);
$sqlbooksellup = "UPDATE bookselling SET username='$name', password='$password',email='$Email',address='$Address' WHERE username='$susername' AND password='$suserpassword'";
mysqli_query($conn2,$sqlbooksellup);
$sqlbookshelfup = "UPDATE bookshelf SET username='$name', password='$password',email='$Email',address='$Address' WHERE username='$susername' AND password='$suserpassword'";
mysqli_query($conn2,$sqlbookshelfup);
$sqlbookwaiting = "UPDATE bookwaiting SET username='$name', password='$password',email='$Email',address='$Address' WHERE username='$susername' AND password='$suserpassword'";
mysqli_query($conn2,$sqlbookwaiting);
}
?>
<br>
<a href="logout.php">reback to the homepage</a>