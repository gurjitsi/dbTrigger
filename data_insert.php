<?php
session_start();
if(!isset($_SESSION['uname']))
{
header("location:index.php");
}
$user=$_SESSION['uname'];
$password=$_SESSION['password'];

    if(isset($_POST['insert']))
      {
        $db=$_POST['db'];
        $table=$_POST['table'];
        $con=mysql_connect('localhost',$user,$password) or die('could not connect to server');
        $d=mysql_select_db($db,$con) or die('could not connect to db');
        $q="select * from $table";
        $r=mysql_query($q);
    
        $ads=array();
        for($i=0;$i<mysql_num_fields($r);$i++)
        {
        $a='name'.$i;
        $na="'".$_POST["$a"]."'";
        array_push($ads,$na);
        }
        $values=implode(",",$ads);
        //echo $values;
        $q1="insert into $table values($values)";
	$result=mysql_query($q1);
          if($result==1)
          {
          header("location:showtables.php?db=$db&table=$table");
          }
          else
          {
           echo "Please try again";
          }
      }
?>
