<?php
session_start();
$_SESSION = array();
$name = $_POST["fname"];
$password = $_POST["fpassword"];
$password1 = $_POST["fpassword1"];
if ($name == "" || $password == "" || $password1 == "") {
  echo '<center><h2>' . "请确认信息完整性!", '</center></h2>';
  echo '<meta http-equiv="refresh" content="1;url=注册.php">';
  exit();
}
if ($password !== $password1) {
  echo '<center><h2>' . "密码不一致！", '</center></h2>';
  echo '<meta http-equiv="refresh" content="1;url=注册.php">';
  exit();
} else {
  $conn = new mysqli("localhost", "admin", "123456", "acger");
  $sql = "select * from user where fname=?";
  $conn_sta = $conn->prepare($sql);
  $conn_sta->bind_param("s", $name);
  $conn_sta->bind_result($fname, $fpassword, $power);
  $conn_sta->execute();
  $conn_sta->fetch();
  if (empty($power)) {
    $sql_insert = "insert into user (fname,fpassword,power)values(?,?,?)";
    $stmt = $conn->prepare($sql_insert);
    $stmt->bind_param("ssi", $name, $password, $power);
    $power = 0;
    $stmt->execute();
    $_SESSION["fname"] = $_POST["fname"];
    $_SESSION["fpassword"] = $_POST["fpassword"];
    $conn_sta->free_result();
    $stmt->close();
    $conn->close();
  } else {
    echo '<h1><center>', "用户名已存在！", '</center></h1>';
    echo '<meta http-equiv="refresh" content="1;url=注册.php">';
    exit();
  }
}
?>
<html>

<body>
  <table align="center" border="1" background="image/d.jpg" width=580 height=316>
    <tr>
      <td>
        <center>
          <h1>注册成功！</h1>
          <meta http-equiv="refresh" content="1;url=留言板主界面.php">
        </center>
      </td>
    </tr>
</body>

</html>