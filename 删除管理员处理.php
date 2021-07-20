<?php
session_start();
if ($_SESSION["fname"] === "admin") {
    if (isset($_GET["fname"])) {
        $conn = new mysqli("localhost", "admin", "123456", "acger");
        $sql = "select * from message where fname = '{$_GET["fname"]}'";
        $rs = mysqli_query($conn, $sql);
        if ($rs) {
            if (mysqli_num_rows($rs) > 0) {
                $sql = "delete from message where fname = '{$_GET["fname"]}'";
                $rs = mysqli_query($conn, $sql);
                $conn->close();
                if ($rs) {
                    echo '<table align="center" border="1" background="image/d.jpg" width=580 height=316><tr><td>';
                    echo '<h1><center>', "删除成功！", '</center><h1>';
                    echo '</td></tr>';
                    echo '<meta http-equiv="refresh" content="1;url=申请管理员.php">';
                    exit();
                } else {
                    echo '<table align="center" border="1" background="image/d.jpg" width=580 height=316><tr><td>';
                    echo '<h1><center>', "该用户不存在！", '</center><h1>';
                    echo '</td></tr>';
                    echo '<meta http-equiv="refresh" content="1;url=申请管理员.php">';
                    exit();
                }
            } else {
                echo '<table align="center" border="1" background="image/d.jpg" width=580 height=316><tr><td>';
                echo '<h1><center>', "该用户不存在！", '</center><h1>';
                echo '</td></tr>';
                echo '<meta http-equiv="refresh" content="1;url=申请管理员.php">';
                exit();
            }
        }
    }
} else {
    echo '<table align="center" border="1" background="image/d.jpg" width=580 height=316><tr><td>';
    echo '<h1><center>', "登录失败请重新登录!", '</center><h1>';
    echo '</td></tr>';
    echo '<meta http-equiv="refresh" content="1;url=后台.php">';
    exit();
}
