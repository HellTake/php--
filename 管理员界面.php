<?php
include('连接数据库并检测是否传入正确.php');
if (empty($power)) {
    echo '<h1><center>', "很抱歉(⊙o⊙)… 登入失败,请重新登录", '</center></h1>';
    echo '<meta http-equiv="refresh" content="1;url=登录.php">';
    exit();
} else {
    if ($fpassword !== 1) {
        echo '<h1><center>', "很抱歉(⊙o⊙)… 您没有权限登录此界面", '</center></h1>';
        echo '<meta http-equiv="refresh" content="1;url=留言板主界面.php">';
        exit();
    } else {
        $conn_sta->free_result();
        $conn_sta->close();
        $conn->close();
    }
}
?>
<html>

<head>
    <meta charset="utf-8">
    <title>管理员界面(command.com)</title>
</head>

<body>
    <table background="image/h.jpg" width=1280 height=570>
        <tr>
            <td>
                <center>
                    <h1>管理员界面</h1>
                </center>
                <center>
                    <h3>删除指定楼数</h3>
                    <form action="管理员删除处理.php" method="post">
                        <input type="text" name="Ids">
                        <input type="submit" value="删除">
                    </form>
                </center>
            </td>
        </tr>
        <form action="留言板主界面.php">
            <input type="submit" value="返回留言板" style="width:100px;height:50px;float:right;margin-top:0px;margin-right:1250px;">
        </form>
    </table>
</body>

</html>