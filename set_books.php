<?php
$host = 'db.bcrab.cn';
$username = 'r130026083';
$password = 'liaojiecheng5386';
$dbname = 'r130026083_books';
$conn = new mysqli($host, $username, $password, $dbname);
$title = $_POST['Title'];
$author = $_POST['Author'];
$ISBN = $_POST['ISBN'];
$Publisher = $_POST['Publisher'];
$Category = $_POST['Category'];
$Price = $_POST['Price'];

if ($conn->connect_errno) {
    die('数据库连接失败：' . $conn->connect_errno);
} else {
    $sql = "UPDATE books SET Price = $Price WHERE ISBN = $ISBN";
   
    $result = mysqli_query($conn,$sql);
    if ($result)
        echo "<script>alert('添加成功')</script>";
    else echo "Failed to add, back to add again.<br>";
}
?>
<br>
<a href=" ">返回继续添加</a> or <a href="home page.html">返回首页</a>