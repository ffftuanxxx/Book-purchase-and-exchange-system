<?php
session_start();
if(isset($_SESSION["adname"]) && isset($_SESSION["adpassword"]) && $_SESSION["adname"] && $_SESSION["adpassword"]){
include "connect_bookdb.php";
$title = $_POST['Title'];
$author = $_POST['Author'];
$ISBN = $_POST['ISBN'];
$Publisher = $_POST['Publisher'];
$Category = $_POST['Category'];
$Price = $_POST['Price'];
$sqlqques = "SELECT * FROM books WHERE ISBN='$ISBN'";
$resultques = mysqli_query($conn2, $sqlqques);
$rowques=mysqli_fetch_array($resultques);
if($Price == "" || $ISBN == "" || $Price=="" || $Category=="" || $Publisher=="" || $author==""){
    header("location:throw_error_isbn_price.php");
}
else if($rowques != ''){
    header("location:throw_error_existisbn.php");
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
    move_uploaded_file($file_tmp,"book_cover/".$upbookcover);
 }
  }
    $sql = "INSERT into books (Title,Author,ISBN,Publisher,Category,Price,inventory,imageb)
    values ('$title','$author','$ISBN','$Publisher','$Category','$Price',10,'$upbookcover')";
   
    $result = mysqli_query($conn2,$sql);
    if ($result)
        echo "<script>alert('Added Successfully!')</script>";
    else echo "Failed to add, back to add again.<br>";
    ?>

<br>
<a href="ad_addbook.php">back to continue insert</a> or <a href="ad_homepage.php">back to the homepage</a>
<?php
} }else{
    header("location:ad_login.php");
}
?>