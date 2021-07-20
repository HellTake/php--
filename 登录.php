<?php
  session_start();
  $_SESSION=array();
  ?>
  <script>
  
  </script>
<html>

<head>
        <meta charset="utf-8">
        <title>Fate讨论区登录界面(fate.com)</title>
</head>

<body>
        <table background="image/b.jpg" width=1370 height=647>
                <tr>
                        <td>
                                <div style="float:right;margin-top:0px;margin-right:500px;">
                                        <center>
                                                <div style="color:#0000FF">
                                                        <h1>Welcome Fate讨论区!</h1>
                                                </div><br>
                                                <form action="登录处理.php" method="post">
                                                        <div style="color:#FF0000">账号: <input type="text" name="fname"></br></div><br>
                                                        <div style="color:#FF0000">密码: <input type="password" name="fpassword"></div><br>
                                                        <div style="float:right;margin-top:0px;margin-right:80px;">
                                                                <input type="submit" value="登录" style="width:100px;height:40px;">
                                                        </div>
                                                        <div style="float:right;margin-top:-30px;margin-right:-250px;color:#0000FF">
                                                                若没有账号点此↓
                                                        </div>
                                                </form>
                                                <div style="float:right;margin-top:-15px;margin-right:-250px;">
                                                        <form action="注册.php">
                                                                <input type="submit" value="注册" style="width:100px;height:40px;">
                                                        </form>
                                                </div>
                                        </center>
                                </div>
                        </td>
                </tr>
</body>

</html>