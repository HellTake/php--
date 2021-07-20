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
$sql = "SELECT fname,liyou FROM message";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
  }
}
$conn->close();
?>
<html><?php if ($_SESSION["fname"] === "admin") { ?>

  <body><a href="http://b/后台.php">后台</a>
  <?php } ?>
  <form action="管理员申请理由.php">
    <input type="submit" value="申请管理员" style="width:100px;height:50px;float:right;margin-top:15px;margin-right:0px;">
  </form>
  <form action="留言板主界面.php">
    <input type="submit" value="返回留言板" style="width:120px;height:50px;float:right;margin-top:0px;margin-right:0px;">
  </form>
  <center>
    <table background="image/i.jpg" width=437 height=750>
      <tr>
        <td>
          <div style="float:right;margin-top:-50px;margin-right:130px;">
            <h1>管理员申请</h1>
            <?php
            $b=1;
            if (!empty($rows)) {
              if(empty($_GET["id"]))
              {
              foreach ($rows as $rowe) { 
                $a++;
                if($a%3==0)
                {
                  $b++;
                }
              }
            }else{
              $b=-999;
            }
            $d=1;
              foreach ($rows as $rowe) {
                $c++;
                if($d==$b||$d==$_GET["id"])
                {
                ?>
                <table border="1" width=300>
                  <tr>
                    <td>
                      <div>
                        留言人：<div><b><?php echo "$rowe[fname]"; ?></b></div>
                      </div>
                      <div>
                        申请理由:<div><b><?php echo "$rowe[liyou]"; ?></b></div>
                      </div>
                      <?php if ($_SESSION["fname"] === "admin") {  ?>
                        <form method="get">
                          <a href="http://b/权限给予处理.php?fname=<?php echo $rowe["fname"]; ?>">升为管理员</a></form>
                        <form method="get">
                          <a href="http://b/删除管理员处理.php?fname=<?php echo $rowe["fname"]; ?>">删除</a></form>
                      <?php } ?>
                    </td>
                  </tr>
                </table>
            <?php }
                if(!empty($_GET["id"]))
                {
                  if($d==$_GET["id"]&&$c%3==0)
                            {
                            echo '<b>',"第",$_GET["id"],"页",'<form action="申请管理员.php" method="get">
                            <input type="text" name="id"style="width:20px;height:20px;">
                            <input type="submit" value="跳转">
                        </form>','</b>';
                            exit();
                            }
                }
                if($c%3==0)
                {
                  $d++;
                }

              }
              if($b==-999&&($d!=$_GET["id"]||($d==$_GET["id"]&&$c%10==0)))
              {
                  echo '<div style="color:#800000"style="float:right;margin-top:0px;margin-right:0px;">', "该页暂无留言", '</div>';
              }
            } else {
              echo '<div style="float:right;margin-top:0px;margin-right:200px;">', "暂无留言", '</div>';
            } ?>
            <h4><?php if(empty($_GET["id"]))
                    {
                        echo "第",$d,"页";
                    }else
                    echo "第",$_GET["id"],"页";?> 
                   <form action="申请管理员.php" method="get">
                       <input type="text" name="id"style="width:20px;height:20px;">
                       <input type="submit" value="跳转">
                   </form></h4>
          </div>
          </div>
        </td>
      </tr>
    </table>
  </center>
  </body>

</html>