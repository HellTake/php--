<?php
include('连接数据库并检测是否传入正确.php');
if (empty($power)) {
  echo '<h1><center>', "很抱歉(⊙o⊙)… 登入失败,请重新登录", '</center></h1>';
  echo '<meta http-equiv="refresh" content="1;url=登录.php">';
  exit();
} else {
  $conn_sta->free_result();
  $conn_sta->close();
  $conn->close();
}
?>
<html>

<body>
  <table align="center" border="1" background="image/d.jpg" width=580 height=316>
    <tr>
      <td>
        <center>
          <h1>登陆成功</h1>
          <meta http-equiv="refresh" content="1;url=留言板主界面.php">
        </center>
      </td>
    </tr>
</body>

</html>