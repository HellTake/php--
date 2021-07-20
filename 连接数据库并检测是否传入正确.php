<?
session_start();
if(empty($_SESSION))
{
$_SESSION['fname']=$_POST["fname"];
$_SESSION['fpassword']=$_POST["fpassword"];
}
$conn=new mysqli("localhost","admin","123456","acger");
$sql="select * from user where fname=? and fpassword=?";
$conn_sta=$conn->prepare($sql);
$fname=$_SESSION["fname"];
$fpassword=$_SESSION["fpassword"];
$conn_sta->bind_param("ss", $fname,$fpassword);
$conn_sta->bind_result($fname,$fpassword,$power);
$conn_sta->execute();
$conn_sta->fetch();
