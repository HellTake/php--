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
$sql = "SELECT Ids,fname,ftime,friend,liuyan,Ids1 FROM acger ORDER BY Ids ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Fate留言板(fate.com）</title>
</head>

<body>
    <h1>Welcome！<?php echo $_SESSION["fname"] ?></h1>
    <?php if ($_SESSION["fname"] === "admin") { ?>
        <a href="http://b/后台.php">后台</a>or<a href="http://b/清空.php">删除所有帖子</a>
    <?php } ?>
    <div style="float:right;margin-right:150px;">
        <a href="发表留言.php">
            <button>
                <h1>发表留言</h1>
            </button>
        </a></div>
    <div style="float:right;margin-right:150px;">
        <a href="管理员界面.php">
            <button>
                <h1>管理员通道</h1>
            </button>
        </a></div>
    <div style="width:100px;float:right;margin-right:150px;">
        <a href="注销.php">
            <button>
                <h1>注销</h1>
            </button>
        </a></div>
    <div style="float:right;margin-right:150px;">
        <a href="申请管理员.php">
            <button>
                <h1>申请管理员</h1>
            </button>
        </a></div>
    <center>
        <table border="1" background="image/c.jpg" width=1064 height=2005 bordercolor="#DA70D6">
            <tr>
                <td>
                    <div style="float:left;margin-top:10px;margin-right:10px;">
                    <div style="color:#0000FF">
                        <h1>Fate交流区</h1>
                    </div>
                        <?php
                        $b=1;
                        if (!empty($rows)) {
                            foreach($rows as $rowe)
                            {
                                $a++;
                                if($a%10==0)
                                {
                                    $b++;
                                }
                            }$d=1;
                            foreach ($rows as $rowe) {
                                $c++;
                                    if($d==$b||$d==$_GET["id"])
                                    {
            
                             ?>
                                <div>
                                    
                                        <table border="1" width=351 bordercolor="#800080">
                                            <tr>
                                                <td><b>
                                                        <?php if ($fpassword === 1) { ?>
                                                            <form method="get">
                                                                <a href="http://b/管理员删除处理.php?Ids=<?php echo $rowe["Ids"]; ?>">删除</a></form>
                                                        <?php } ?>
                                                            <div>楼层: <a class="Ids"> <?php echo "$rowe[Ids]"; ?></a></div><br>
                                                            <div>
                                                                留言人：<?php echo "$rowe[fname]"; ?><?php if (empty($rowe["friend"])) {
                                                                                                    } else {
                                                                                                        echo "对", $rowe["Ids1"], "楼", $rowe["friend"], "回复";
                                                                                                    } ?></div>
                                                                <div><?php if (empty($rowe["friend"])) {
                                                                            echo "留言";
                                                                        } else {
                                                                            echo "回复";
                                                                        } ?>时间:
                                                                    <?php echo "$rowe[ftime]"; ?>
                                                                </div>
                                                                <div><?php if (empty($rowe["friend"])) {
                                                                            echo "留言";
                                                                        } else {
                                                                            echo "回复";
                                                                        } ?>
                                                                    内容：<br>
                                                                    <div style="width:351px;word-wrap:break-word;word-break:break-all;overflow: hidden;"><?php echo "$rowe[liuyan]"; ?></div></div>
                                                                <form method="GET">
                                                                    <a href="http://b/回复.php?name=<?php echo $rowe["fname"] ?>&Ids1=<?php echo $rowe["Ids"]; ?>">回复</a></form>

                                                    </b>
                                                </td>
                                            </tr>
                                        </table>
                                    
                                </div>
                        <?php }
                        if(!empty($_GET["id"]))
                        {
                            $b=-999;
                            if($d==$_GET["id"]&&$c%10==0)
                            {
                            echo '<b>',"第",$_GET["id"],"页",'<form action="留言板主界面.php" method="get">
                            <input type="text" name="id"style="width:20px;height:20px;">
                            <input type="submit" value="跳转">
                        </form>','</b>';
                            exit();
                            }
                        }
                        if($c%10==0)
                        {
                            $d++;
                        }
                        }
                        if($b==-999&&($d!=$_GET["id"]||($d==$_GET["id"]&&$c%10==0)))
                        {
                            echo '<div style="color:#800000"style="float:right;margin-top:0px;margin-right:0px;">', "该页暂无留言", '</div>';
                        } } else echo '<div style="color:#800000"style="float:right;margin-top:0px;margin-right:0px;">', "该页暂无留言", '</div>'; ?>
                    <h4><?php if(empty($_GET["id"]))
                    {
                        echo "第",$d,"页";
                    }else
                    echo "第",$_GET["id"],"页";?> 
                   <form action="留言板主界面.php" method="get">
                       <input type="text" name="id"style="width:20px;height:20px;">
                       <input type="submit" value="跳转">
                   </form></h4>
                </div>
                    
                </td>
            </tr>
        </table>
    
    </center>

</body>

</html>