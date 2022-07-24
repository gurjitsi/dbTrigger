<?php
session_start();
if(!isset($_SESSION['uname']))
{
header("location:index.php");
}
$user=$_SESSION['uname'];
$password=$_SESSION['password'];

$sql=$_POST['sql'];
echo $sql;
$db=$_POST['db'];
$tab=$_POST['table'];
 $con=mysql_connect('localhost',$user,$password) OR die('soory lo');
 $d=mysql_select_db($db,$con) OR die('sorry db');
 $qu="DELETE from $tab WHERE $sql LIMIT 1";
 $res=mysql_query($qu);
 if($res==1)
 {
 header("location:showtables.php?db=$db&table=$tab");
 }
 else
 {
 echo "sorry";
 }
?>
