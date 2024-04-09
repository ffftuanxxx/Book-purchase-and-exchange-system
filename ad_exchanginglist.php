<?php 
session_start();
include "ad_startbar.php";
include "connect_bookdb.php";
if(isset($_SESSION["adname"]) && isset($_SESSION["adpassword"]) && $_SESSION["adname"] && $_SESSION["adpassword"]){
    $usernamead = $_SESSION["adname"];
    $passwordad = $_SESSION["adpassword"];
?>
<?php
    $sqlqpend = "SELECT * FROM adcheckex";
    $resultpend = mysqli_query($conn2, $sqlqpend);
    ?>
    <table align="center" class="test" id="testing" cellpadding="0" cellspacing="0" style="border-collapse:separate; border-spacing: 0px 10px;border:#CCC 1px solid;font-size: 20px;">
        <head>
            <link rel="stylesheet" type="text/css" href="css/home.css">
        </head>
        <tr style="border:#CCC 1px solid;">
            <td>username</td>
            <td>Title</td>
            <td>Author</td>
            <td>ISBN</td>
            <td>Publisher</td>
            <td>Category</td>
            <td>Price</td>
            <td>imageex</td>
            <td>purusername</td>
        </tr>
        <?php
        while ($rowpend = mysqli_fetch_array($resultpend)) {

        ?>
                <tr>
                    <td><?php echo "$rowpend[1]"; ?></td>
                    <td><?php echo "$rowpend[3]"; ?></td>
                    <td><?php echo "$rowpend[4]"; ?></td>
                    <td><?php echo "$rowpend[5]"; ?></td>
                    <td><?php echo "$rowpend[6]"; ?></td>
                    <td><?php echo "$rowpend[7]"; ?></td>
                    <td><?php echo "$rowpend[8]"; ?></td>
                    <td><img src="exchange_cover/<?php echo $rowpend['imageex']; ?>" height="150px" width="100px"></td>
                    <td><?php echo "$rowpend[10]"; ?></td>
                </tr>
        <?php 
        } ?>
    </table>
<?php } ?>