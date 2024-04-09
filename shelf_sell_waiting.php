<?php
session_start();
include "connect_db.php";
include "connect_bookdb.php";
if(isset($_SESSION["username"]) && isset($_SESSION["password"]) && $_SESSION["username"] && $_SESSION["password"]){
    $username = $_SESSION["username"];
    $password = $_SESSION["password"];
    $email = $_SESSION["email"];
    $address = $_SESSION["address"];
    $favor = $_SESSION["favor"];
    $head = $_SESSION["head"];
    $title = $_GET['stitle'];
    $sqlq2 = "SELECT * FROM bookshelf WHERE username='$username' AND password='$password' AND booktitle='$title'";
    $resultq2 = mysqli_query($conn2,$sqlq2);
    $rowq2=mysqli_fetch_array($resultq2);
    $amountshelf = $rowq2['amount'];

    $sqlqin = "INSERT INTO bookselling (username,password,email,address,booktitle,amount) VALUES ('$username','$password','$email','$address','$title','$amountshelf')";
    mysqli_query($conn2,$sqlqin);

    header("location:bookshelf.php");
?>
<?php
 }
?>