<?php
include('连接数据库并检测是否传入正确.php');
if (empty($power)) {
  echo '<h1><center>', "很抱歉(⊙o⊙)… 登入失败,请重新登录", '</center></h1>';
  echo '<meta http-equiv="refresh" content="1;url=后台.php">';
  exit();
} else {
  $conn_sta->free_result();
  $conn_sta->close();
  mysqli_query($conn, "set names utf8");
  $sql = "SELECT fname,power,fpassword FROM user";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $rows[] = $row;
    }
  }
  $conn->close();
}
?>
<html>

<body>
  <center>
    <table background="image/i.jpg" width=437 height=750>
      <tr>
        <td>
          <div style="float:right;margin-top:70px;margin-right:130px;">
            <form action="后台.php">
              <input type="submit" value="返回后台界面" style="width:120px;height:50px;float:right;margin-top:-380px;margin-right:180px;">
            </form>
            <div style="float:right;margin-top:-300px;margin-right:0px;">
              <h1>管理员列表</h1>
            </div>
            <?php
            if (!empty($rows)) {
              echo '<div class="mess">';
              foreach ($rows as $rowe) { ?>
                <?php if ($rowe["power"] == 1) { ?>
                  <div style="float:right;margin-top:<?php echo -200 + $a;
                                                      $a = $a + 65; ?>;margin-right:-50px;">
                    <table border="1" width=300>
                      <tr>
                        <td>
                          <div>
                            管理员：<?php echo "$rowe[fname]"; ?><form method="get">
                              <a href="http://b/权限撤销处理.php?fname=<?php echo $rowe["fname"]; ?>">撤销权限</a></form>
                          </div>
                        </td>
                      </tr>
                    </table>
                  </div>
                <?php } ?>
            <?php }
            } else {
              echo '<div style="float:right;margin-top:0px;margin-right:200px;">', "暂无管理员", '</div>';
            } ?>

        </td>
      </tr>
    </table>
  </center>
</body>

</html>