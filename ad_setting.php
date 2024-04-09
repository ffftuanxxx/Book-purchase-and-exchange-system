<?php
session_start();
include 'connect_admindb.php';
include "ad_startbar.php";
if(isset($_SESSION["adname"]) && isset($_SESSION["adpassword"]) && $_SESSION["adname"] && $_SESSION["adpassword"]){
    $usernamead = $_SESSION["adname"];
    $passwordad = $_SESSION["adpassword"];
    $sqlset = "SELECT * FROM admin WHERE adminname='$usernamead' AND password='$passwordad'";
    $resultset = mysqli_query($connad,$sqlset);
    $rowset=mysqli_fetch_array($resultset);
?>
    <form style="top:100px; left: 200px; position:absolute;" class="form-horizontal" role="form" action="ad_setting_action.php" method="POST">
    <div class="form-group">
        <label class="col-sm-2 control-label">Your old username</label>
            <div class="col-sm-10">
                <p class="form-control-static" name="usernamere"><?php echo $usernamead; ?></p>
            </div>
        <label for="inputPassword" class="col-sm-2 control-label">Please input a new username</label>
            <div class="col-sm-6 input-group input-group">
                <span class="input-group-addon" id="basic-addon1">@</span>
                <input name="usernamead" type="text" class="form-control" id="inputPassword" placeholder="input a new username" aria-describedby="basic-addon3">
            </div><br><br>    
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Your old password</label>
            <div class="col-sm-10">
                <p class="form-control-static"><?php echo $passwordad; ?></p>
            </div>
        <label for="inputPassword" class="col-sm-2 control-label">Please input a new password</label>
            <div class="col-sm-6">
                <input  name="passwordad" type="password" class="form-control" id="inputPassword" placeholder="input a new password">
            </div><br><br><br><br>    
    </div><br>  
    <p style="left: 500px; position:absolute;">
    <button type="submit">Submit</button><br>
    </form>
    <?php
}
else{
    header("location:ad_login.php");
}
    ?>