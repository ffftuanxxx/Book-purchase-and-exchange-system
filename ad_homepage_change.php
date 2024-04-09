<?php 
session_start();
include "ad_startbar.php";
include "connect_bookdb.php";
if(isset($_SESSION["adname"]) && isset($_SESSION["adpassword"]) && $_SESSION["adname"] && $_SESSION["adpassword"]){
    $username = $_SESSION["adname"];
    $password = $_SESSION["adpassword"];
    $isbnc = $_GET['cisbn'];
    $sqlcb = "SELECT * FROM books WHERE ISBN='$isbnc'";
    $resultcb = mysqli_query($conn2,$sqlcb);
    $rowcb=mysqli_fetch_array($resultcb);
?>

<body>
    
<form style="left: 550px; top:100px; position:absolute;" class="form-horizontal" role="form" action="ad_reallychange_action.php" method="POST">
    <div class="form-group">
        <label for="inputPassword" class="col-sm-6 control-label">Please change the book title</label>
            <div class="col-sm-6">
                <input value="<?php echo $rowcb[1];?>" name="Title" type="text" class="form-control" id="inputPassword" placeholder="input the book title" aria-describedby="basic-addon3">
            </div><br><br><br>
    </div>

    <div class="form-group">
        <label for="inputPassword" class="col-sm-6 control-label">Please change the book author</label>
            <div class="col-sm-6">
                <input value="<?php echo $rowcb[2];?>" name="Author" type="text" class="form-control" id="inputPassword" placeholder="input the book auther">
            </div><br><br><br><br>    
    </div>

    <div class="form-group">

        <label for="inputPassword" class="col-sm-6 control-label">Please change the book ISBN</label>
            <div class="col-sm-6">
                <input value="<?php echo $rowcb[3];?>" name="ISBN" type="number" class="form-control" id="inputPassword" placeholder="input the book ISBN">
            </div><br><br><br><br>    
    </div>

    <div class="form-group">
        <label for="inputPassword" class="col-sm-6 control-label">Please change the book publisher</label>
            <div class="col-sm-6">
                <input  value="<?php echo $rowcb[4];?>" name="Publisher" type="text" class="form-control" id="inputPassword" placeholder="input the book publisher">
            </div><br><br><br><br>    
    </div>

    <div class="form-group">
        <label for="inputPassword" class="col-sm-6 control-label">Please change the book price</label>
            <div class="col-sm-6">
                <input value="<?php echo $rowcb[6];?>" name="Price" type="number" step="0.01" class="form-control" id="inputPassword" placeholder="input the book price">
            </div><br><br><br><br>    
    </div>

    <div class="form-group">
        <label for="inputPassword" class="col-sm-6 control-label">Please change the book category</label>
            <div class="col-sm-6">
            <select name="Category" id="favor" value="<?php echo $rowcb[5];?>">
                    <option value="Life">Life</option>
                    <option value="History">History</option>
                    <option value="Suspense">Suspense</option>
                    <option value="Fairy">Fairy</option>
                    <option value="Self help">Self help</option>
                    </select>
            </div><br><br><br><br>    
    </div>
    <div class="form-group">
        <label for="inputPassword" class="col-sm-6 control-label">Please change the book's inventory</label>
            <div class="col-sm-6">
                <input type="number" name="inventory" value="<?php echo $rowcb['inventory'];?>" class="form-control" id="inputPassword" placeholder="input the book price">
            </div><br><br><br><br>    
    </div>

    <div class="form-group">
        <label for="inputPassword" class="col-sm-6 control-label">Please change the book cover</label>
            <div class="col-sm-6">
                <input type="text" name="bookcover" value="<?php echo $rowcb[8];?>" class="form-control" id="inputPassword" placeholder="input the book price">
            </div><br><br><br><br>    
    </div>



    
    <p style=" left: 250px; top:725px; position:absolute;">
    <button style="height: 50px; width: 100px" type="submit">Submit</button><br>
    </form>





</body>

<?php
}else{
    header("location:ad_login.php");
}
?>