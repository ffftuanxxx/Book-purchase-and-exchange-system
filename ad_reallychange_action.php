<?php
session_start();
if(isset($_SESSION["adname"]) && isset($_SESSION["adpassword"]) && $_SESSION["adname"] && $_SESSION["adpassword"]){
include "connect_bookdb.php";
$title = $_POST['Title'];
$author = $_POST['Author'];
$ISBN = $_POST['ISBN'];
$Publisher = $_POST['Publisher'];
$Category = $_POST['Category'];
$Price = $_POST['Price'];
$inventory = $_POST['inventory'];
$bookcover = $_POST['bookcover'];
if($Price == "" || $ISBN == ""){
    header("location:throw_error_isbn_price.php");
}
else{
    $sql = "UPDATE books SET Title='$title',Author='$author',ISBN='$ISBN',Publisher='$Publisher',Category='$Category',Price='$Price',inventory='$inventory',imageb='$bookcover' WHERE ISBN='$ISBN'";
   
    $result = mysqli_query($conn2,$sql);
    if ($result)
        echo "<script>alert('Added Successfully!')</script>";
        ?>

        <br>
        <a href="ad_homepage.php">back to homepage</a>
        <?php
        } }else{
            header("location:ad_login.php");
        }
        ?>