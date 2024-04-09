<?php
session_start();
include "ad_startbar.php";
if(isset($_SESSION["adname"]) && isset($_SESSION["adpassword"]) && $_SESSION["adname"] && $_SESSION["adpassword"]){
?>

<body>
    
<form style="left: 550px; top:100px; position:absolute;" class="form-horizontal" role="form" action="ad_addbook_action.php" method="POST"  enctype="multipart/form-data">
    <div class="form-group">
        <label for="inputPassword" class="col-sm-6 control-label">Please input the book title</label>
            <div class="col-sm-6">
                <input name="Title" type="text" class="form-control" id="inputPassword" placeholder="input the book title" aria-describedby="basic-addon3">
            </div><br><br><br>
    </div>

    <div class="form-group">
        <label for="inputPassword" class="col-sm-6 control-label">Please input the book auther</label>
            <div class="col-sm-6">
                <input name="Author" type="text" class="form-control" id="inputPassword" placeholder="input the book auther">
            </div><br><br><br><br>    
    </div>

    <div class="form-group">

        <label for="inputPassword" class="col-sm-6 control-label">Please input the book ISBN</label>
            <div class="col-sm-6">
                <input name="ISBN" type="number" class="form-control" id="inputPassword" placeholder="input the book ISBN">
            </div><br><br><br><br>    
    </div>

    <div class="form-group">
        <label for="inputPassword" class="col-sm-6 control-label">Please input the book publisher</label>
            <div class="col-sm-6">
                <input name="Publisher" type="text" class="form-control" id="inputPassword" placeholder="input the book publisher">
            </div><br><br><br><br>    
    </div>

    <div class="form-group">
        <label for="inputPassword" class="col-sm-6 control-label">Please input the book price</label>
            <div class="col-sm-6">
                <input name="Price" type="number" step="0.01" class="form-control" id="inputPassword" placeholder="input the book price">
            </div><br><br><br><br>    
    </div>

    <div class="form-group">
        <label for="inputPassword" class="col-sm-6 control-label">Please input the book cover</label>
            <div class="col-sm-6">
                <input name="bookcover" type="file" class="form-control" id="inputPassword" placeholder="input the book price">
            </div><br><br><br><br>    
    </div>

    <div class="form-group">
        <label for="inputPassword" class="col-sm-6 control-label">Please choose the book category</label>
            <div class="col-sm-6">
            <select name="Category" id="favor" value="">
                    <option value="Life">Life</option>
                    <option value="History">History</option>
                    <option value="Suspense">Suspense</option>
                    <option value="Fairy">Fairy</option>
                    <option value="Self help">Self help</option>
                    </select>
            </div><br><br><br><br>    
    </div>

    
    <p style=" left: 275px; top:650px; position:absolute;">
    <button style="height: 50px; width: 100px" type="submit" onclick="blankerror()">Submit</button><br>
    </form>

    <script>
        function blankerror(){
        if(document.getElementsByName("Price")=="" || document.getElementsByName("Category")=="" ||document.getElementsByName("Publisher")=="" ||document.getElementsByName("ISBN")=="" || document.getElementsByName("Author")==""){
            alert("The attribute of the Books cannot be blank!");
        }
    }
    </script>
</body>
<?php
}else{
    header("location:ad_login.php");
}
?>

    
