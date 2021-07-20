<?php
include('连接数据库并检测是否传入正确.php');
include('xss防注入.php');

if(empty($power))
{
  echo '<h1><center>',"很抱歉(⊙o⊙)… 登入失败,请重新登录",'</center></h1>';
    echo '<meta http-equiv="refresh" content="1;url=登录.php">';
    exit();
}
if(empty($_POST["liuyan"]))
{
    echo'<table align="center" border="1" background="image/d.jpg" width=580 height=316><tr><td>';
  echo '<h1><center>',"输入内容为空！",'</center><h1>';
  echo '</td></tr>';
  echo '<meta http-equiv="refresh" content="1;url=发表留言.php">';
  exit();
}
$conn_sta->free_result();
$conn_sta->close();
$result = mysqli_query($conn,"SELECT * FROM acger ORDER BY Ids DESC");
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $row["Ids"]++;
    break;
    }
} else {
    $row["Ids"]=1;
}
$ftime=date("Y-m-d h:i:s");
if(empty($_SESSION["Ids"]))
{
    $Ids1=0;
}else{
$Ids1=$_SESSION["Ids"];
}
$sql="insert into acger(Ids,fname,ftime,friend,Ids1,liuyan)VALUES(?,?,?,?,?,?)";
$conn_sta=$conn->prepare($sql);
$conn_sta->bind_param("ssssss", $row["Ids"],$_SESSION["fname"],$ftime,$_SESSION["friend"],$Ids1,$_POST["liuyan"]);
$conn_sta->execute();
$sql="select * from acger where fname='{$_SESSION["fname"]}' and ftime='{$ftime}'";
$result = $conn->query($sql);
$row=$result->fetch_assoc();
if (!empty($row["liuyan"])) {
    echo'<table align="center" border="1" background="image/d.jpg" width=580 height=316><tr><td>';
    echo '<h1><center>',"回复成功！",'</center><h1>';
    echo '</td></tr>';
    echo '<meta http-equiv="refresh" content="1;url=留言板主界面.php">';
    $_SESSION["friend"]=NULL;
    $conn->close();
    exit();
} else {
    echo'<table align="center" border="1" background="image/d.jpg" width=580 height=316><tr><td>';
    echo '<h1><center>',"长度过长！",'</center><h1>';
    echo '</td></tr>';
    echo '<meta http-equiv="refresh" content="10;url=留言板主界面.php">';
    $_SESSION["friend"]=NULL;
    $conn->close();
    exit();
}
