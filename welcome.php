<?php
session_start();
if(isset($_SESSION["username"]) && isset($_SESSION["password"]) && $_SESSION["username"] && $_SESSION["password"]){
?>
<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">

    <title>welcome</title>
    <link rel="stylesheet" href="welcome.css">
</head>

<body>
    <div class="container">
        <div class="letter letter1">
            <span>d</span>
            <span>e</span>
            <span>f</span>
            <span>g</span>
            <span class="check">h</span>
            <span>i</span>
            <span>j</span>
            <span>k</span>
            <span>l</span>
            <span>m</span>
            <span>n</span>
            <span>o</span>
            <span>p</span>
            <span>q</span>
            <span>r</span>
            <span>s</span>
            <span>t</span>
            <span>u</span>
            <span>v</span>
            <span>w</span>
            <span>x</span>
            <span>y</span>
            <span>z</span>
            <span>a</span>
            <span>b</span>
            <span>c</span>
        </div>
        <div class="letter letter2">
            <span>b</span>
            <span>c</span>
            <span>d</span>
            <span class="check">e</span>
            <span>f</span>
            <span>g</span>
            <span>h</span>
            <span>i</span>
            <span>j</span>
            <span>k</span>
            <span>l</span>
            <span>m</span>
            <span>n</span>
            <span>o</span>
            <span>p</span>
            <span>q</span>
            <span>r</span>
            <span>s</span>
            <span>t</span>
            <span>u</span>
            <span>v</span>
            <span>w</span>
            <span>x</span>
            <span>y</span>
            <span>z</span>
            <span>a</span>
        </div>
        <div class="letter letter3">
            <span>s</span>
            <span>t</span>
            <span>u</span>
            <span>v</span>
            <span>w</span>
            <span>x</span>
            <span class="check">y</span>
            <span>z</span>
            <span>a</span>
            <span>b</span>
            <span>c</span>
            <span>d</span>
            <span>e</span>
            <span>f</span>
            <span>g</span>
            <span>h</span>
            <span>i</span>
            <span>j</span>
            <span>k</span>
            <span>l</span>
            <span>m</span>
            <span>n</span>
            <span>o</span>
            <span>p</span>
            <span>q</span>
            <span>r</span>
        </div>
    </div>

    <p style="left: 750px; top:700px; position:absolute;">
    <button onclick="location.href='homepage.php'" type="button" class="btn btn-primary btn-lg">GO TO homepage</button>
    </p>

</html>
</body>

</html>
<?php }else{
        header("location:throw_not_login.php");
} ?>