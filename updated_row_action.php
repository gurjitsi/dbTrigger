<?php
session_start();
if(!isset($_SESSION['uname']))
{
header("location:index.php");
}
$user=$_SESSION['uname'];
$password=$_SESSION['password'];

 if(isset($_POST['submit']))
 {
        $value_updated = array();
        $tab=$_POST['tab'];
        $sql=$_POST['sql'];
        $db=$_POST['db'];
        $con=mysql_connect('localhost',$user,$password) or die('could not connect to server');
        $d=mysql_select_db($db,$con) or die('could not connect to db');
        $q="select * from $tab";
        $r=mysql_query($q);
        for($i=0;$i<mysql_num_fields($r);$i++)
        {
        $a='name'.$i;
        $na="'".$_POST["$a"]."'";
        $b='field'.$i;
        $na1=$_POST["$b"];
        $update=$na1."=".$na;
        array_push($value_updated,$update);
        }
        $sqlquery=implode(",",$value_updated);
        echo $sqlquery;
        #echo $sql;
        $query="UPDATE $tab SET $sqlquery WHERE $sql LIMIT 1";
        $run=mysql_query($query);
        if($run==1)
        {
        header("location:showtables.php?db=$db&table=$tab");
        }
        else
        {
        echo "sorry";
        }
 }
?>
