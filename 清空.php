<?php
echo $_SESSION["fname"];
if ($_SESSION["fname"] == "admin") {
    $conn = new mysqli("localhost", "admin", "123456", "acger");
    $sql = "select * from acger";
    $rs = mysqli_query($conn, $sql);
    if ($rs) {
        if (mysqli_num_rows($rs) > 0) {
            $sql = "delete from acger";
            $rs = mysqli_query($conn, $sql);
            if ($rs) {
                echo '<table align="center" border="1" background="image/d.jpg" width=580 height=316><tr><td>';
                echo '<h1><center>', "清空成功！", '</center><h1>';
                echo '</td></tr>';
                echo '<meta http-equiv="refresh" content="1;url=留言板主界面.php">';
                exit();
            } else {
                echo '<table align="center" border="1" background="image/d.jpg" width=580 height=316><tr><td>';
                echo '<h1><center>', "没有任何留言可以删除！", '</center><h1>';
                echo '</td></tr>';
                echo '<meta http-equiv="refresh" content="1;url=留言板主界面.php">';
                exit();
            }
        } else {
            echo '<table align="center" border="1" background="image/d.jpg" width=580 height=316><tr><td>';
            echo '<h1><center>', "没有任何留言可以删除！", '</center><h1>';
            echo '</td></tr>';
            echo '<meta http-equiv="refresh" content="1;url=留言板主界面.php">';
            exit();
        }
    }
}
$conn->close;
