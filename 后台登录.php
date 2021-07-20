<html>

<head>
    <title>管理员登录</title>
</head>

<body>
    <center>
    <?php session_start();
    $_SESSION = array();?>
        <form action="后台.php" method="post">
            <h1>管理员登录</h1><br>
            
            账号: <input type="text" name="fname"><br>
            密码: <input type="text" name="fpassword"><br>
            <input type="hidden" name="id"value="123">
            <input type="submit" value="登录">
        </form>
    </center>
</body>

</html>