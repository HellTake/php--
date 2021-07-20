<?php
if (isset($_GET["Ids"])) {
    $_POST["Ids"] = $_GET["Ids"];
}
if (isset($_POST["Ids"])) {
    $conn = new mysqli("localhost", "admin", "123456", "acger");
    $sql = "select * from acger where Ids = '{$_POST["Ids"]}'";
    $rs = mysqli_query($conn, $sql);
    if ($rs) {
        if (mysqli_num_rows($rs) > 0) {
            $sql = "delete from acger where Ids = {$_POST["Ids"]}";
            $rs = mysqli_query($conn, $sql);
            if ($rs) {
                echo '<table align="center" border="1" background="image/d.jpg" width=580 height=316><tr><td>';
                echo '<h1><center>', "删除成功！", '</center><h1>';
                echo '</td></tr>';
                echo '<meta http-equiv="refresh" content="1;url=留言板主界面.php">';
                exit();
            } else {
                echo '<table align="center" border="1" background="image/d.jpg" width=580 height=316><tr><td>';
                echo '<h1><center>', "该楼层不存在！", '</center><h1>';
                echo '</td></tr>';
                echo '<meta http-equiv="refresh" content="1;url=留言板主界面.php">';
                exit();
            }
        } else {
            echo '<table align="center" border="1" background="image/d.jpg" width=580 height=316><tr><td>';
            echo '<h1><center>', "该楼层不存在！", '</center><h1>';
            echo '</td></tr>';
            echo '<meta http-equiv="refresh" content="1;url=留言板主界面.php">';
            exit();
        }
    }
    $conn->close;
}
