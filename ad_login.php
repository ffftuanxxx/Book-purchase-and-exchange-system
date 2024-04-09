<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">

    <title>Administrator Login</title>
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

        <div class="container">
            <div class="login-box">
                <div class="owl" id="owl">
                    <div class="hand"></div>
                    <div class="hand hand-r"></div>
                    <div class="arms">
                        <div class="arm"></div>
                        <div class="arm arm-r"></div>
                    </div>
                </div>
                <div class="input-box">
                    <br>
                    <form action="ad_login_action.php" method="POST"  class="input-box">
                    <input type="text" placeholder="username" name="adnamein">
                    <input type="password" placeholder="password" id="password" name="adpasswdin">      
                    <br>
                    <button type="submit">Administrator Login</button>
                    <br>
                    </form> 
                </div>
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