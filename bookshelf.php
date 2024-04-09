<?php
session_start();
include "connect_db.php";
include "connect_bookdb.php";
if(isset($_SESSION["username"]) && isset($_SESSION["password"]) && $_SESSION["username"] && $_SESSION["password"]){
    $username = $_SESSION["username"];
    $password = $_SESSION["password"];
    $sqlshelf = "SELECT * FROM bookshelf WHERE username='$username' AND password='$password'";
    $resultshelf = mysqli_query($conn2,$sqlshelf);
    $sqlhea = "SELECT * FROM bookuser WHERE username='$username'";
    $resulthea = mysqli_query($conn,$sqlhea);
    $row = mysqli_fetch_assoc($resulthea);
    $head = $row['head'];
    include "startbar.php";
?>

<p align="center" style="font-size: 50px; "><img src="images/Logo.jpg" style="width: 150px; height:150px;"></a>This is Kbone book store-Bookshelf</p>
<table width=100% class="test" align="center">
<?php
    $flag = 3;
    while($rowshelf=mysqli_fetch_array($resultshelf)){
        $title = $rowshelf['booktitle'];
        $sqlhome = "SELECT * FROM books WHERE Title='$title'";
        $resultinhome = mysqli_query($conn2,$sqlhome);
        $rowhome=mysqli_fetch_array($resultinhome);
        if($flag % 3 == 0){ 
            echo "<tr>";
        }?>
    <div>
    <td class="td"><a href="homepage_detail.php?detitle=<?=$rowhome[1]?>"><img src="book_cover/<?php echo$rowhome['imageb']; ?>" height="300px" width="200px"></a><br>
    <id="title">Title:<?php $title = $rowhome[1]; echo "$rowhome[1]";?><br>
    Price:<?php echo "$rowhome[6]"; ?><br>
    Author:<?php echo "$rowhome[2]"; ?>
    </td>
    </div>
<?php
$flag++;}
?>
</table>
<br><br><br><hr>
<h1>Sell your book to us!</h1>
<table align="center" class="test" id="testing" cellpadding="0" cellspacing="0" style="border-collapse:separate; border-spacing: 0px 10px;border:#CCC 1px solid;font-size: 20px;">
            <head>
        <link rel="stylesheet" type="text/css" href="css/home.css">
            </head>
        <tr style="border:#CCC 1px solid;">
         <td>image</td>
         <td>Title</td>
         <td>Origin Price</td>
         <td>ISBN</td>
         <td>Amount</td>
         <td>Sell price</td>
         <td>Status</td>
       </tr>
       <?php
        $sqlshelf = "SELECT * FROM bookshelf WHERE username='$username' AND password='$password'";
        $resultshelf = mysqli_query($conn2,$sqlshelf);
    while($rowshelf=mysqli_fetch_array($resultshelf)){
        $amountowned = $rowshelf['amount'];
        $titlex = $rowshelf['booktitle'];
        $sqlhome = "SELECT * FROM books WHERE Title='$titlex'";
        $resultinhome = mysqli_query($conn2,$sqlhome);
        $rowhome=mysqli_fetch_array($resultinhome);
        $sold = ($amountowned * $rowhome[6])*0.7;
?>

    <tr>
         <td><img src="book_cover/<?php echo $rowhome['imageb']; ?>" height="100px" width="50px"></td>
         <td><?php echo "$rowhome[1]";?></td>
         <td id="<?php echo "$rowhome[6]";?>"><?php echo "$rowhome[6]";?></td>
         <td id="<?php echo "$rowhome[3]";?>"><?php echo "$rowhome[3]";?></td>
         <td><?php echo "$amountowned"; ?></td>
         <td><?php echo "$sold";?></td>
         <td><a href="shelf_sell_waiting.php?stitle=<?=$titlex?>">Sell</td>
    </tr>
<?php } ?>
</table>

<br><br><br><br><br><hr>
<h1>Please wait for shop to check!</h1>
<?php
$sqlqpe = "SELECT * FROM bookselling WHERE username='$username' AND password='$password'";
$resultwa = mysqli_query($conn2,$sqlqpe);
?>
<table align="center" class="test" id="testing" cellpadding="0" cellspacing="0" style="border-collapse:separate; border-spacing: 0px 10px;border:#CCC 1px solid;font-size: 20px;">
            <head>
        <link rel="stylesheet" type="text/css" href="css/home.css">
            </head>
        <tr style="border:#CCC 1px solid;">
        <td>image</td>
         <td>Title</td>
         <td>Origin Price</td>
         <td>ISBN</td>
         <td>Amount</td>
         <td>Sell price</td>
         <td>Status</td>
       </tr>
    <?php
    while($rowwa=mysqli_fetch_array($resultwa)){
        $amountwa = $rowwa['amount'];
        $titlewa = $rowwa['booktitle'];
        if($titlewa != ""){
        $sqlsewa = "SELECT * FROM books WHERE Title='$titlewa'";
        $resultsewa = mysqli_query($conn2,$sqlsewa);
        $rowsewa=mysqli_fetch_array($resultsewa);
        $sellingtosh = ($amountwa * $rowsewa[6])*0.7;
    ?>
    <tr>
        <td><img src="book_cover/<?php echo $rowsewa['imageb']; ?>" height="100px" width="50px"></td>
         <td><?php echo $titlewa;?></td>
         <td><?php echo "$rowsewa[6]";?></td>
         <td><?php echo "$rowsewa[3]";?></td>
         <td><?php echo $amountwa;?></td>
         <td><?php echo $sellingtosh; ?></td>
         <td>pending</td>
    </tr>
    <?php } } ?>
    </table>
<?php }
else{
    header("location:throw_not_login.php");
}
?>
