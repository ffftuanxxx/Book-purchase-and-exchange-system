<?php
session_start();
include "ad_startbar.php";
include "connect_bookdb.php";
include "connect_db.php";
if(isset($_SESSION["adname"]) && isset($_SESSION["adpassword"]) && $_SESSION["adname"] && $_SESSION["adpassword"]){
        $usernamead = $_SESSION["adname"];
        $passwordad = $_SESSION["adpassword"];
        $sqladq = "SELECT * FROM bookselling";
        $resultadq = mysqli_query($conn2,$sqladq);
?>

<table class="test" id="testing" cellpadding="0" cellspacing="0" style=" border:#CCC 1px solid;">
        <head>
    <link rel="stylesheet" type="text/css" href="css/home.css">
        </head>
    <tr style="border:#CCC 1px solid;">
         <th>Username</th>
         <th>Password</th>
         <th>Email</th>
         <th>Address</th>
         <th>Book</th>
         <th>Amount</th>
         <th>Status</th>
       </tr>
       <?php
        while($rowadq=mysqli_fetch_array($resultadq)){
            if($rowadq[5] != ''){
                $user = $rowadq[1];
                $password2 = $rowadq[2];
                $bookre = $rowadq[5];
    ?>
    <tr>
    <td><?php echo "$rowadq[1]";?></td>
         <td><?php echo "$rowadq[2]";?></td>
         <td><?php echo "$rowadq[3]";?></td>
         <td><?php echo "$rowadq[4]";?></td>
         <td><?php echo "$rowadq[5]"; ?></td>
         <td><?php echo "$rowadq[6]"; ?></td>
         <td><a href="ad_recievebook.php?user=<?=$user?>&pass=<?=$password2?>&bookt=<?=$bookre?>">Recieve</a></td>
    </tr>
    <?php } } ?>
    </table>
<?php }
else{
    header("location:ad_login.php");
} ?>