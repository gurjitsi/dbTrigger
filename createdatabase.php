<?php
	session_start();
        if(!isset($_SESSION['uname']))
	{
	header("location:index.php");
	}
	$user=$_SESSION['uname'];
	$password=$_SESSION['password'];
	if(isset($_POST['sub']))
	{
 	$a=$_POST['db'];
 	#echo $a;
 	$con=mysql_connect('localhost',$user,$password);
 	$qu="create database $a";
 	$res=mysql_query($qu);
  	if($res==1)
  	{
  	header('location:main.php');
  	}
  	else
  	{
  	header('location:main.php');
  	}
	}
?>
