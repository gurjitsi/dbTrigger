<?php
	session_start();
	if(!isset($_SESSION['uname']))
	{
	header("location:index.php");
	}
	$user=$_SESSION['uname'];
	$password=$_SESSION['password'];
	if(isset($_GET['fl'])&&($_GET['table'])&&($_GET['db']))
	{
	$f=$_GET['fl'];	
	$table=$_GET['table'];
	$db=$_GET['db'];
	}
	else
	{
	$f=$_POST['field'];
	$table=$_POST['table'];
	$db=$_GET['db'];
	//echo $db;
	}
	$nu=0;

  // $db=$_POST['db'];
  // $table=$_POST['table'];
  // $f=$_POST['field'];
   #echo $db.$table.$f;
   for($i=0;$i<$f;$i++)
   {
    $fld='field'.$i;
    $typ='type'.$i;
    $len='length'.$i;
    $aut='auto'.$i;
    $ind='index'.$i;
    $nll='null'.$i;
    $a=$_POST["$fld"];
    $b=$_POST["$typ"];
    $c=$_POST["$len"];
    if(isset($_POST["$aut"]))
    {
    $d=$_POST["$aut"];
    }
    else
    {
    $d= NULL;
    }
    $e=$_POST["$ind"];
    /*if(isset($_POST["$nll"]))
    {
    $f=$_POST["$nll"];
    }
    else 
    {
    $f= NULL;
    }*/
    echo $a;
    echo $b;
    echo $c;
    echo $d;
    echo $e;
    //echo $f;
      if($i==0)
      {
      $con=mysql_connect('localhost',$user,$password) or die('Connecting to MySQL failed');
      $db=mysql_select_db($db,$con) or die('Connecting to db failed'); 
      $qu="create table $table($a $b($c) $d $e)";
      $result=mysql_query($qu);
      echo $result;
      }
      else
      { 
      $con=mysql_connect('localhost',$user,$password) or die('Connecting to MySQL failed');
      $db=mysql_select_db($_GET['db'],$con) or die('Connecting to db failed'); 
      $qu="alter table $table ADD $a $b($c) $d $e";
      $result=mysql_query($qu);
      echo $result;
      }
  }
$dbase=$_GET['db'];
header("location:table.php?db=$dbase");
?>
<!--   end of create table    -->
