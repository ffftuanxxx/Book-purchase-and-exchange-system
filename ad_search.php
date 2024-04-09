<?php
session_start();
include "ad_startbar.php";
include "connect_bookdb.php";
if(isset($_SESSION["adname"]) && isset($_SESSION["adpassword"]) && $_SESSION["adname"] && $_SESSION["adpassword"]){
$keywords=$_POST['ad_keywords'];
$sqlse="SELECT * from books where Title like '%$keywords%' or Category like '%$keywords%' or ISBN like '%$keywords%' or Publisher like '%$keywords%' or Author like '%$keywords%'";
$resultse=mysqli_query($conn2,$sqlse);
?> 

<html>


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
    while($rowcauserse=mysqli_fetch_array($resultse)){
    ?>
   <tr>
     <td><img src="book_cover/<?php echo $rowcauserse['imageb']; ?>" height="100px" width="65px"></td>
     <td id="<?php echo "$rowcauserse[6]";?>"><?php echo "$rowcauserse[6]";?></td>
     <td><?php echo "$rowcauserse[1]";?></td>
     <td><?php echo "$rowcauserse[2]";?></td>
     <td id="<?php echo "$rowcauserse[3]";?>"><?php echo "$rowcauserse[3]";?></td>
     <td><?php echo "$rowcauserse[4]";?></td>
     <td><?php echo "$rowcauserse[5]";?></td>
     <td><?php echo $rowcauserse['inventory']; ?></td>
     <td><a href="ad_homepage_delete.php?dtitle=<?=$rowcauserse[1]?>">Delete</a></td>
     <td><a href="ad_homepage_change.php?cisbn=<?=$rowcauserse[3]?>">Change</a></td>
   </tr>
   <?php } ?>
</table>


</html>
<?php 
}else{
  header("location:ad_login.php");
}
?>


