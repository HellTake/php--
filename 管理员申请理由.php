<?php
include('连接数据库并检测是否传入正确.php');
if (empty($power)) {
  echo '<h1><center>', "很抱歉(⊙o⊙)… 登入失败,请重新登录", '</center></h1>';
  echo '<meta http-equiv="refresh" content="1;url=登录.php">';
  exit();
} else {
  if($fpassword==1)
  {
    echo '<h1><center>', "您已经是管理员啦！", '</center></h1>';
  echo '<meta http-equiv="refresh" content="1;url=申请管理员.php">';
  exit();
  }
  $conn_sta->free_result();
  $conn_sta->close();
}
?>
<html>

<body>
  <table align="center" border="1" background="image/f.jpg" width=578 height=800>
    <tr>
      <td>
        <form action="管理员申请理由处理.php" method="post">
          <h1>申请理由:</h1>
          <textarea rows="5" cols="50" input type="text" name="liyou"></textarea>
          <input type="submit" value="提交申请" style="width:100px;height:100px;float:right;margin-top:20px;margin-right:20px;">
        </form>
        <form action="申请管理员.php">
          <input type="submit" value="返回申请主界面" style="width:120px;height:50px;float:right;margin-top:-490px;margin-right:450px;">
        </form>
      </td>
    </tr>
</body>

</html>