<?php
session_start();
include "connect_bookdb.php";
include "connect_db.php";
if (isset($_SESSION["username"]) && isset($_SESSION["password"]) && $_SESSION["username"] && $_SESSION["password"]) {
    $username = $_SESSION["username"];
    $password = $_SESSION["password"];
    $sqlcart = "SELECT * FROM bookuser WHERE username='$username' AND password ='$password'";
    $resultcabook = mysqli_query($conn, $sqlcart);
    $rowcauser1 = mysqli_fetch_array($resultcabook);
    $sqlhea = "SELECT * FROM bookuser WHERE username='$username'";
    $resulthea = mysqli_query($conn,$sqlhea);
    $row = mysqli_fetch_assoc($resulthea);
    $head = $row['head'];
    include "startbar.php";
?>
<p align="center" style="font-size: 50px; "><img src="images/Logo.jpg" style="width: 150px; height:150px;"></a>This is Kbone book store-Cart</p>
<table class="test" id="testing" cellpadding="0" cellspacing="0" style=" border:#CCC 1px solid;">
        <head>
        <link rel="icon" href="images/logo.ico" type="images/x-ico" />
    <link rel="stylesheet" type="text/css" href="css/home.css">
        </head>
    <tr style="border:#CCC 1px solid;">
            <th>Image</th>
            <th>Price</th>
            <th>Title</th>
            <th>Author</th>
            <th>ISBN</th>
            <th>Publisher</th>
            <th>Category</th>
            <th>Amount</th>
            <th>Select</th>
            <th>Cancel</th>
            <th>MORE</th>
            <th>BUY</th>
        </tr>
        <?php
        while ($rowcauser1 = mysqli_fetch_array($resultcabook)) {
            $title = $rowcauser1['testing'];
            $amount = $rowcauser1['amount'];
            $sqlbook = "SELECT * FROM books WHERE Title='$title'";
            $resultcabook2 = mysqli_query($conn2, $sqlbook);
            $rowcauser = mysqli_fetch_array($resultcabook2);
        ?>
            <tr>
                <td><img src="book_cover/<?php echo $rowcauser['imageb']; ?>" height="100px" width="65px"></td>
                <td id="<?php echo "$rowcauser[6]"; ?>"><?php echo "$rowcauser[6]"; ?></td>
                <td><?php echo "$rowcauser[1]"; ?></td>
                <td><?php echo "$rowcauser[2]"; ?></td>
                <td id="<?php echo "$rowcauser[3]"; ?>"><?php echo "$rowcauser[3]"; ?></td>
                <td><?php echo "$rowcauser[4]"; ?></td>
                <td><?php echo "$rowcauser[5]"; ?></td>
                <td><?php echo "$amount"; ?></td>
                <td id="<?php echo "$rowcauser[3]"; ?>"><input type="checkbox" onclick="calculate(this,<?php echo $rowcauser[6]; ?>,<?php echo $amount; ?>)"></td>
                <td><a href="cart_action.php?xtitle=<?= $title ?>">Delete</td>
                <td><a href="cart_action_more.php?mtitle=<?= $title ?>">More</td>
                <td><a href="cart_buy_waiting.php?btitle=<?= $title ?>">BUY</td>
            </tr>
        <?php } ?>
    </table>
    <script>
        var total = 0;

        function calculate(checkbox, price, amount) {
            price = Math.floor(price * 1000) / 1000;
            if (checkbox.checked == true) {
                total = total + price * amount;
            } else {
                total = total - price * amount;
            }

            console.log("price:",price, "  total:",total)
            total = total.toFixed(1);
            total = parseFloat(total);
            document.getElementById("caltotal").value = total;
        }
    </script>
    <?php  ?>

    <br><br><br><br>
    <hr>
    <div align="right">
        <p style="font-size: 35px;">Total:&nbsp;<input disabled style=" border:#CCC 1px solid; height: 50px; width:150px; font-size: 35px;" id="caltotal"> </p>
    </div>
    <br><br><br><br>
    <hr>
    <h1>Waiting for Shop to deliever!</h1>
    <?php
    $sqlqwa = "SELECT * FROM bookwaiting WHERE username='$username' AND password='$password'";
    $resultwa = mysqli_query($conn2, $sqlqwa);
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
            <th>Amount</th>
            <th>Status</th>
        </tr>
        <?php
        while ($rowwa = mysqli_fetch_array($resultwa)) {
            $amountwa = $rowwa['amount'];
            $titlewa = $rowwa['booktitle'];
            if ($titlewa != "") {
                $sqlsewa = "SELECT * FROM books WHERE Title='$titlewa'";
                $resultsewa = mysqli_query($conn2, $sqlsewa);
                $rowsewa = mysqli_fetch_array($resultsewa);
        ?>
                <tr>
                    <td><img src="book_cover/<?php echo $rowsewa['imageb']; ?>" height="100px" width="65px"></td>
                    <td id="<?php echo "$rowsewa[6]"; ?>"><?php echo "$rowsewa[6]"; ?></td>
                    <td><?php echo "$rowsewa[1]"; ?></td>
                    <td><?php echo "$rowsewa[2]"; ?></td>
                    <td id="<?php echo "$rowsewa[3]"; ?>"><?php echo "$rowsewa[3]"; ?></td>
                    <td><?php echo "$amountwa"; ?></td>
                    <td>pending</td>
                </tr>
        <?php }
        } ?>
    </table>
<?php
}else{
    header("location:throw_not_login.php");
} ?>