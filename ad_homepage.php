
<?php
session_start();
include "ad_startbar.php";
include "connect_bookdb.php";
if(isset($_SESSION["adname"]) && isset($_SESSION["adpassword"]) && $_SESSION["adname"] && $_SESSION["adpassword"]){
    $username = $_SESSION["adname"];
    $password = $_SESSION["adpassword"];
    $sqlsetb = "SELECT * FROM books";
    $resultsetb = mysqli_query($conn2,$sqlsetb);
    ?>

    
    <table class="test" id="testing" cellpadding="0" cellspacing="0" style=" border:#CCC 1px solid;">
        <head>
    <link rel="stylesheet" type="text/css" href="css/home.css">
        </head>
    <tr style="border:#CCC 1px solid;">
     <th>image</th>
     <th>Price</th>
     <th>Title</th>
     <th>Author</th>
     <th>ISBN</th>
     <th>Publisher</th>
     <th>Category</th>
     <th>Amount</th>
     <th>DELETE</th>
     <th>Change</th>
   </tr>
    <?php 
    while($rowcausersetb=mysqli_fetch_array($resultsetb)){
    ?>
   <tr>
     <td><img src="book_cover/<?php echo $rowcausersetb['imageb']; ?>" height="100px" width="65px"></td>
     <td id="<?php echo "$rowcausersetb[6]";?>"><?php echo "$rowcausersetb[6]";?></td>
     <td><?php echo "$rowcausersetb[1]";?></td>
     <td><?php echo "$rowcausersetb[2]";?></td>
     <td id="<?php echo "$rowcausersetb[3]";?>"><?php echo "$rowcausersetb[3]";?></td>
     <td><?php echo "$rowcausersetb[4]";?></td>
     <td><?php echo "$rowcausersetb[5]";?></td>
     <td><?php echo $rowcausersetb['inventory']; ?></td>
     <td><a href="ad_homepage_delete.php?dtitle=<?=$rowcausersetb[1]?>">Delete</td>
     <td><a href="ad_homepage_change.php?cisbn=<?=$rowcausersetb[3]?>">Change</td>
   </tr>



<?php }
?>

</body>

</html>
<?php
}else{
    header("location:ad_login.php");
}
?>