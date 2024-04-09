<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">

    <title>Sign up</title>
    <link rel="stylesheet" href="login.css">
    <script src="jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $('#password').focus(function(){
                // 密码框获得焦点，追加样式.password
                $('#owl').addClass('password');
            }).blur(function(){
                // 密码框失去焦点，移除样式.password
                $('#owl').removeClass('password');
            })
        })
    </script>
</head>

<body>

        <div class="container" style="height: 600px;">
            <div class="login-box" >
                <div class="owl" id="owl">
                    <div class="hand"></div>
                    <div class="hand hand-r"></div>
                    <div class="arms">
                        <div class="arm"></div>
                        <div class="arm arm-r"></div>
                    </div>
                </div>
                <div class="input-box" >
                    <br>
                    <form action="ad_signup_action.php" method="POST" class="input-box" enctype="multipart/form-data">
                    <input type="text" placeholder="username" name="namead">
                    <input type="password" placeholder="password"name="passwad" id="password">
                    <input type="password" placeholder="confirm password" name="passwad2" id="password">
                    <input type="password" placeholder="adminkey:Kbone" name="key" id="password">
                    <button> Admin Submit</button>
                    </form> 
                </div>
            <span>already has account?  <a href="ad_login.php">go to login</a></span>
        </div>
    </div>

    <div class="square">
        <ul>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <div class="circle">
        <ul>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>

</body>

</html>