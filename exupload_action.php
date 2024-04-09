<?php
session_start();
include "connect_bookdb.php";
if(isset($_SESSION["username"]) && isset($_SESSION["password"]) && $_SESSION["username"] && $_SESSION["password"]){
    $usernameu = $_SESSION["username"];
    $passwordu = $_SESSION["password"];
$title = $_POST['Title'];
$author = $_POST['Author'];
$ISBN = $_POST['ISBN'];
$Publisher = $_POST['Publisher'];
$Category = $_POST['Category'];
$Price = $_POST['Price'];
if($Price == "" || $ISBN == "" || $Publisher=='' || $Category=='' || $title=='' || $author==''){
    header("location:throw_error_exupempty.php");
}
else{
if (isset($_FILES['bookcover'])) {
    $errors = array();
    $file_name = $_FILES['bookcover']['name']; // actual file name
    $file_size = $_FILES['bookcover']['size']; // file byte size
    $file_tmp = $_FILES['bookcover']['tmp_name']; // temp file
    $file_type = $_FILES['bookcover']['type']; // file MIME type
 
    $tagArr = explode('.', $_FILES['bookcover']['name']);
    $file_ext = strtolower(end($tagArr));
    $extensions = array("jpeg", "jpg", "png");
 
    if (in_array($file_ext, $extensions) === false) {
       $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
   }
   if ($file_size > 6291456) {
    $errors[] = 'File size must be excately < 6 MB';
 }
 if (empty($errors) == true){
    $upbookcover = strtolower(reset($tagArr)."_".time().".".strtolower(end($tagArr)));
    move_uploaded_file($file_tmp,"exchange_cover/".$upbookcover);
 }
  }
    $sql = "INSERT into exbooks (username,password,Title,Author,ISBN,Publisher,Category,Price,imageex)
    values ('$usernameu','$passwordu','$title','$author','$ISBN','$Publisher','$Category','$Price','$upbookcover')";
   
   $sqlmy = "INSERT into exbookshelf (username,password,Title,Author,ISBN,Publisher,Category,Price,imageex)
    values ('$usernameu','$passwordu','$title','$author','$ISBN','$Publisher','$Category','$Price','$upbookcover')";

    $result = mysqli_query($conn2,$sqlmy);

    $result = mysqli_query($conn2,$sql);
    if ($result)
        echo "<script>alert('Added Successfully!')</script>";
    else echo "Failed to add, back to add again.<br>";
    ?>

<br>
<a href="exupload.php">back to continue upload</a> or <a href="exmarket.php">backtomarket</a>
<?php
}

?>
<?php
}else{
    header("location:throw_not_login.php");
}
?>