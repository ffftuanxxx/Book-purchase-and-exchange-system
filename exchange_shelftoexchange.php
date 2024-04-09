<?php 
session_start();
include "connect_db.php";
include "connect_bookdb.php";
if(isset($_SESSION["username"]) && isset($_SESSION["password"]) && $_SESSION["username"] && $_SESSION["password"]){
    $usernameus = $_SESSION["username"];
    $passwordus = $_SESSION["password"];
    $ISBN = $_GET['deisbn'];

    $sqlqe = "SELECT * FROM exbookshelf WHERE username='$usernameus' AND password='$passwordus' AND ISBN='$ISBN'";
    $resultqe = mysqli_query($conn2,$sqlqe);
    $rowbepqe = mysqli_fetch_array($resultqe);

    $sqlupdmy = "INSERT into exbooks (username,password,Title,Author,ISBN,Publisher,Category,Price,imageex)
    values ('$usernameus','$passwordus','$rowbepqe[3]','$rowbepqe[4]','$rowbepqe[5]','$rowbepqe[6]','$rowbepqe[7]','$rowbepqe[8]','$rowbepqe[9]')";
    mysqli_query($conn2,$sqlupdmy);

    $sqldelmormy = "DELETE FROM exbookshelf WHERE username='$usernameus' AND password='$passwordus' AND ISBN='$ISBN'";
    mysqli_query($conn2,$sqldelmormy);
    header("location:exbookshelf.php");
?>


<?php }else{
    header("location:throw_not_login.php");
} ?>