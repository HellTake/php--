<?php
session_start();
if ($_SESSION["fname"] === "admin") {
    $conn = new mysqli("localhost", "admin", "123456", "acger");

    $sql = "select * from user where fname='{$_GET["fname"]}'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo $row["power"];
    if ($row["power"] == 0) {
        $conn = new mysqli("localhost", "admin", "123456", "acger");
        $sql = "update user set power='1' where fname='{$_GET["fname"]}'";
        $rs = mysqli_query($conn, $sql);
        $conn->close();
        if ($rs) {
            echo '<table align="center" border="1" background="image/d.jpg" width=580 height=316><tr><td>';
            echo '<h1><center>', "权限给与成功！", '</center><h1>';
            echo '</td></tr>';
            echo '<meta http-equiv="refresh" content="1;url=申请管理员.php">';
            exit();
        } else {
            echo '<table align="center" border="1" background="image/d.jpg" width=580 height=316><tr><td>';
            echo '<h1><center>', "权限给与失败！", '</center><h1>';
            echo '</td></tr>';
            echo '<meta http-equiv="refresh" content="1;url=申请管理员.php">';
        }
    } else {
        echo '<table align="center" border="1" background="image/d.jpg" width=580 height=316><tr><td>';
        echo '<h1><center>', "未找到该用户或该用户已经是管理员！", '</center><h1>';
        echo '</td></tr>';
        echo '<meta http-equiv="refresh" content="1;url=申请管理员.php">';
    }
} else {
    echo '<table align="center" border="1" background="image/d.jpg" width=580 height=316><tr><td>';
    echo '<h1><center>', "登录失败请重新登录!", '</center><h1>';
    echo '</td></tr>';
    echo '<meta http-equiv="refresh" content="1;url=后台.php">';
}
