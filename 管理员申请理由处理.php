<?php
include('连接数据库并检测是否传入正确.php');
if(empty($power))
{
  echo '<h1><center>',"很抱歉(⊙o⊙)… 登入失败,请重新登录",'</center></h1>';
    echo '<meta http-equiv="refresh" content="1;url=登录.php">';
    exit();
}else
{
$conn_sta->free_result();
$conn_sta->close();
}
$liyou=$_POST["liyou"];
$sql="insert into message(fname,liyou)VALUES(?,?)";
$conn_sta=$conn->prepare($sql);
$conn_sta->bind_param("ss", $fname,$liyou);
$conn_sta->execute();
$sql="select * from message where liyou='{$liyou}'";
$result = $conn->query($sql);
$row=$result->fetch_assoc();
if (!empty($row)) {
    echo'<table align="center" border="1" background="image/d.jpg" width=580 height=316><tr><td>';
    echo '<h1><center>',"申请成功！",'</center><h1>';
    echo '</td></tr>';
    echo '<meta http-equiv="refresh" content="1;url=申请管理员.php">';
    exit();
} else {
    echo'<table align="center" border="1" background="image/d.jpg" width=580 height=316><tr><td>';
    echo '<h1><center>',"长度过长！",'</center><h1>';
    echo '</td></tr>';
    echo '<meta http-equiv="refresh" content="1;url=管理员申请理由.php">';
    exit();
}
$conn->close();
