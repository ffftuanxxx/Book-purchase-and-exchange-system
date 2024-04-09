<?php 
session_start();
include "connect_db.php";
include "connect_bookdb.php";
if(isset($_SESSION["username"]) && isset($_SESSION["password"]) && $_SESSION["username"] && $_SESSION["password"]){
    $usernameus = $_SESSION["username"];
    $passwordus = $_SESSION["password"];
    $myisbn = $_GET['myisbn'];

    $isbnpurchaser = $_GET['purisbn'];
    $puruser = $_GET['puruser'];
    $purpass = $_GET['purpass'];

    $sqlother = "SELECT * FROM exbooks WHERE username='$puruser' AND password='$purpass' AND ISBN='$isbnpurchaser'";
    $resultother = mysqli_query($conn2,$sqlother);//inquire others books
    $rowbeother = mysqli_fetch_array($resultother);

    $sqlmy = "SELECT * FROM exbooks WHERE username='$usernameus' AND password='$passwordus' AND ISBN='$myisbn'";
    $resultmy = mysqli_query($conn2,$sqlmy);//inquire this user books
    $rowbepmy = mysqli_fetch_array($resultmy);

    $sqlupdmy = "INSERT into exbookshelf (username,password,Title,Author,ISBN,Publisher,Category,Price,imageex)
    values ('$usernameus','$passwordus','$rowbeother[3]','$rowbeother[4]','$rowbeother[5]','$rowbeother[6]','$rowbeother[7]','$rowbeother[8]','$rowbeother[9]')";
    mysqli_query($conn2,$sqlupdmy);//insert this user's book to book shelf

    $sqlupdother = "INSERT into exbookshelf (username,password,Title,Author,ISBN,Publisher,Category,Price,imageex)
    values ('$puruser','$purpass','$rowbepmy[3]','$rowbepmy[4]','$rowbepmy[5]','$rowbepmy[6]','$rowbepmy[7]','$rowbepmy[8]','$rowbepmy[9]')";
    mysqli_query($conn2,$sqlupdother);//insert other user's book to bookshelf

    $sqldelmy = "DELETE FROM exbookshelf WHERE username='$usernameus' AND password='$passwordus' AND ISBN='$myisbn'";
    mysqli_query($conn2,$sqldelmy);//delete this user's book from bookshelf

    $sqldelother = "DELETE FROM exbookshelf WHERE username='$puruser' AND password='$purpass' AND ISBN='$isbnpurchaser'";
    mysqli_query($conn2,$sqldelother);//delete this the other's book from bookshelf

    $sqldelwait = "DELETE FROM exwaiting WHERE purusername='$puruser' AND purpassword='$purpass' AND ISBN='$myisbn'";
    mysqli_query($conn2,$sqldelwait);//delete this successfully exchanged record of the users

    $sqldelmarot = "DELETE FROM exbooks WHERE username='$puruser' AND password='$purpass' AND ISBN='$isbnpurchaser'";
    mysqli_query($conn2,$sqldelmarot);//delete the information from the market

    $sqldelmormy = "DELETE FROM exbooks WHERE username='$usernameus' AND password='$passwordus' AND ISBN='$myisbn'";
    mysqli_query($conn2,$sqldelmormy);//delete the information from the market
    header("location:exbookshelf.php");
?>
<?php }else{
    header("location:throw_not_login.php");
} ?>