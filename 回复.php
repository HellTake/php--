<?php
include('连接数据库并检测是否传入正确.php');
if (empty($power)) {
  echo '<h1><center>', "很抱歉(⊙o⊙)… 登入失败,请重新登录", '</center></h1>';
  echo '<meta http-equiv="refresh" content="1;url=登录.php">';
  exit();
} else {
  $conn_sta->free_result();
  $conn_sta->close();
}
mysqli_query($conn, "set names utf8");
$_SESSION['friend'] = $_GET['name'];
$_SESSION['Ids'] = $_GET['Ids1'];
$conn->close();
?>
<html>

<body>
  <table align="center" border="1" background="image/f.jpg" width=578 height=800>
    <tr>
      <td>
        <form action="留言处理.php" method="post">
          <h1>回复:</h1>
          <textarea rows="5" cols="50" input type="text" name="liuyan"></textarea>
          <input type="submit" value="发表" style="width:100px;height:100px;float:right;margin-top:20px;margin-right:20px;">
        </form>
        <form action="留言板主界面.php">
          <input type="submit" value="返回留言板" style="width:100px;height:50px;float:right;margin-top:-490px;margin-right:470px;">
        </form>
      </td>
    </tr>
</body>

</html>