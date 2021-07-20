<?php
session_start();
if(!($_POST["id"]==123||$_SESSION["fname"]=="admin"))
{?>
<html>

<head>
    <title>管理员登录</title>
</head>

<body>
    <center>
    <?php session_start();
    $_SESSION = array();?>
        <form action="后台.php" method="post">
            <h1>管理员登录</h1><br>
            
            账号: <input type="text" name="fname"><br>
            密码: <input type="text" name="fpassword"><br>
            <input type="hidden" name="id"value="123">
            <input type="submit" value="登录">
        </form>
    </center>
</body>

</html>
<?php }else{?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
   <meta charset="utf-8" />
   <title>后台界面</title>
   <link />
</head>
<?php
if (empty($_SESSION["fname"]) && empty($_SESSION["fpassword"])) {
   $_SESSION["fname"] = $_POST["fname"];
   $_SESSION["fpassword"] = $_POST["fpassword"];
}
if ($_SESSION["fname"] === "admin" && $_SESSION["fpassword"]==="123456") { ?>

   <body>
      <center>
         <div id="top">
            <div><h1><b>
               管理中心</b></h1>
               <hr>
            </div>
            所有网页：&nbsp&nbsp
            <a href="留言板主界面.php">留言板主界面&nbsp</a>
            <a href="注销.php">注销&nbsp</a>
            <a href="登录.php">登录</a><br>
            <a href="发表留言.php">发表留言&nbsp</a>
            <a href="登录处理.php">登录处理&nbsp</a>
            <a href="留言处理.php">留言处理</a><br>
            <a href="回复.php">回复&nbsp</a>
            <a href="注册.php">注册&nbsp</a>
            <a href="注册处理.php">注册处理</a><br>
            <a href="管理员界面.php">管理员界面&nbsp</a>
            <a href="申请管理员.php">申请管理员&nbsp</a>
            <a href="管理员删除处理.php">管理员删除处理</a><br>
            <a href="管理员申请理由.php">管理员申请理由&nbsp</a>
            <a href="管理员申请理由处理.php">管理员申请理由处理&nbsp</a><br>
            <a href="删除管理员处理.php">删除管理员处理&nbsp</a>
            <a href="权限给予处理.php">权限给予处理&nbsp</a>
            <a href="管理员列表.php">管理员列表</a><br>
            <a href="权限撤销处理.php">权限撤销处理</a>
            <a href="注销1.php">注销1</a>
            <a href="用户列表.php">用户列表</a>
            <a href="用户删除处理.php">用户删除处理</a>
            <a href="清空.php">清空</a>
            <a href="连接数据库并检测是否传入正确.php">连接数据库并检测是否传入正确</a>
            <a href="xss防注入.php">xss防注入</a>
            <hr>
            <div>
               <a href="登录.php" style="color:rgb(146, 6, 6);">网站登录界面</a>&nbsp;|&nbsp;
               管理员: admin <a href="注销1.php">[注销]</a>
            </div>
         </div>
         <div id="sidebar">


            <div>系统</div>
            <a href="管理员列表.php">管理员</a>
            <a href="申请管理员.php">添加管理员</a>
            <div>内容管理</div>
            <a href="留言板主界面.php">帖子管理</a>
            <div>用户管理</div>
            <a href="用户列表.php">用户列表</a>



         </div>
         <div>功能说明</div>
         <div>

            <b>1.留言<br>
            2.管理员控制<br>
            3.用户管理</b>

         </div>
         </div>
      </center>
   <?php } else {
   echo '<center><h1>登录失败！</h1></center>';
   $_POST["id"]=NULL;
   $_SESSION=array();
   echo '<meta http-equiv="refresh" content="1;url=后台.php">';
   exit();
} ?>
   </body>

</html><?php
}?>