<?php
session_start();
if(!isset($_SESSION['uname']))
{
header("location:index.php");
}
$user=$_SESSION['uname'];
$password=$_SESSION['password'];

  if(isset($_GET['deletetable'])&&($_GET['db']))
  {
  $tb=$_GET['deletetable'];
  $db=$_GET['db'];
  $con=mysql_connect('localhost',$user,$password);
  $database=mysql_select_db($db,$con);
  $qu="DROP table $tb";
  $result=mysql_query($qu);
  if($result==1)
  {
  header("location:table.php?db=$db");
  }
  else
  {
  header("location:table.php?db=$db");
  }
  }
?>
