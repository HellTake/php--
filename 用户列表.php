<?php
session_start();
if($_SESSION["fname"]==="admin")
{
  $conn = new mysqli("localhost", "admin", "123456", "acger");
  mysqli_query($conn, "set names utf8");
  $sql = "SELECT fname,power,fpassword FROM user";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $rows[] = $row;
    }
  }
  $conn->close();
}else{
  echo '<table align="center" border="1" background="image/d.jpg" width=580 height=316><tr><td>';
    echo '<h1><center>', "登录失败请重新登录!", '</center><h1>';
    echo '</td></tr>';
    echo '<meta http-equiv="refresh" content="1;url=后台.php">';
}
?>
<html>

<body>
  <center>
    <table background="image/j.jpg" width=468 height=800>
      <tr>
        <td>
          <div style="float:right;margin-top:70px;margin-right:130px;">
            <form action="后台.php">
              <input type="submit" value="返回后台界面" style="width:120px;height:50px;float:right;margin-top:-320px;margin-right:180px;">
            </form>
            <div style="float:right;margin-top:-300px;margin-right:0px;">
              <h1>用户列表</h1>
              <?php
              if (!empty($rows)) {
                echo '<div class="mess">';
                foreach ($rows as $rowe) { ?>
                  <table border="1" width=300>
                    <tr>
                      <td>
                        <div>
                          用户：<?php echo "$rowe[fname]", " 密码: ", "$rowe[fpassword]"; ?><form method="get">
                            <a href="http://b/用户删除处理.php?fname=<?php echo $rowe["fname"]; ?>">删除该用户</a></form>
                        </div>
            </div>
        </td>
      </tr>
    </table>
<?php }
              } else {
                echo '<div style="float:right;margin-top:0px;margin-right:200px;">', "暂无用户", '</div>';
              } ?>
</div>
</td>
</tr>
</table>
  </center>
</body>

</html>