<?php
session_start();
if(!isset($_SESSION['uname']))
{
header("location:index.php");
}
$user=$_SESSION['uname'];
$password=$_SESSION['password'];
?>
<html>
<title>
dbTrigger
</title>
<head>
<style type='text/css'>
#link4
{  
background: -moz-linear-gradient(top, grey,grey);
background: -webkit-gradient(linear, left top, left bottom, from(grey), to(grey));
background-color:grey; font-family:arial; color:grey; font-size:18px; font-weight:bold; text-decoration:none;
}
#link4:hover 
{  
background: -moz-linear-gradient(top, grey, white); 
background: -webkit-gradient(linear, left top, left bottom, from(grey), to(white));
font-family:arial; color:black; font-size:18px; font-weight:bold; text-decoration:none;
}
#cor 
{
background: -moz-linear-gradient(top, white, silver);
background: -webkit-gradient(linear, left top, left bottom, from(white), to(silver));
}
#cor22 
{
border: 2px solid #444; 
    overflow: hidden;
    position: relative;
}
</style>
</head>
<body id='cor'>
<table width='970px' height='550px' border='0' align='center' id='cor22'>
<tr>
<td>

<table width='960px' height='540px' border='0' align='center'>
<tr>
<td width='200px' valign='top'>

<table height='550px' width='190px'>
<tr>
<td style='font-family:arial; color:grey; font-size:18px; font-weight:bold; text-decoration:none;'>
<span style='font-family:arial; color:#444; font-size:20px; font-weight:bold; text-decoration:none;'>dbTrigger 1.0</span>
</td>
</tr>
<tr>
<td style='font-family:arial; color:grey; font-size:14px; font-weight:bold; text-decoration:none;'>
<br/>
Databases
</td>
</tr>
<tr>
<td>
<?php
$table=$_GET['table'];
$db1=$_GET['db'];
$con=mysql_connect('localhost',$user,$password);
$qu='show databases';
$res=mysql_query($qu);
echo "<table border='0' height='450px' width='190px' bgcolor='grey'>";
while($row=mysql_fetch_array($res))
{
$db=$row['Database'];
echo "<tr><td><img src='image/database.png' height='20px' width='20px'></td><td style='font-family:arial; color:white; font-size:14px; font-weight:bold; text-decoration:none;'>";
echo "<a style='color:white; text-decoration:none;' href='table.php?db=$db'>$db</a>";
echo "</td></tr>";
}
echo "</table>";
?>
</td>
</tr>
</table>
</td>
<td>

<table height='550px' width='730px' border='0' align='center' id='cor22'>
<tr>
<td height='100px' align='right'>

<table height="30px" width="300" border='0'>

<tr>
                                    <td align='center' width='160px'><a style='font-family:arial; color:#444; font-size:14px; font-weight:bold; text-decoration:none;' href='main.php'><img src='image/home.png' width='50px' height='50px'><br/>Home</a></td>

				     <td align='center' width='160px'><a style='font-family:arial; color:#444; font-size:14px; font-weight:bold; text-decoration:none;' href='databases.php'><img src='image/database.png' width='50px' height='50px'>Databases</a></td>

                                    <td align='center' width='160px'><a style='font-family:arial; color:#444; font-size:14px; font-weight:bold; text-decoration:none;' href='logout.php'><img src='image/import.png' width='50px' height='50px'>Logout</a></td>
                                    
                                     <td align='center' width='160px'><a style='font-family:arial; color:#444; font-size:14px; font-weight:bold; text-decoration:none;' href='insertdata.php?db=<?php echo $db1; ?>&amp;table=<?php echo $table; ?>'><img src='image/insert.png' width='50px' height='50px'>Insert</a></td>

					 </tr>

</table>

</td>
</tr>
<tr>
<td valign='top'>

<br/><br/>
<?php
 $table=$_GET['table'];
 $db=$_GET['db'];
 $datastore=array();
 $fieldstore = array();
 $datastore1= array();
 $fieldstore1= array();
 $dataok = array();
 $con=mysql_connect('localhost',$user,$password);
 $d=mysql_select_db($db,$con);
 $qu="select * from $table";
 $res=mysql_query($qu);
 echo "<table width='600px' border='0' align='center' id='cor22'><tr>";
 $qu1="select * from $table";
 $res1=mysql_query($qu1);
 while($show1=mysql_fetch_field($res1))
 {
 echo "<td bgcolor='grey' style='color:white; text-decoration:none; font-weight:bold; font-size:16px;' align='center'>";
 echo $show1->name;
 echo "</td>";
 }
 echo "<td colspan='2' bgcolor='grey' style='color:white; text-decoration:none; font-weight:bold; font-size:16px;' align='center'>Action</td></tr>";

 while($show=mysql_fetch_assoc($res))
 {
  echo "<tr>";
  foreach($show as $col=>$rowss)
  {
  echo "<td id='cor' style='color:#444; text-decoration:none; font-weight:bold; font-size:16px;'>";
  echo $rowss;
  echo "</td>";
  array_push($datastore,$rowss);
  array_push($fieldstore,$col);
  }
  $field_number=mysql_num_fields($res);
  $splice=array_splice($datastore,0,$field_number);
  $splice1=array_splice($fieldstore,0,$field_number);
  $combine=array_combine($splice1,$splice);
  foreach($combine as $number1 => $number2)
  {
  $dataupdated=$number1."="."'".$number2."'";
  array_push($dataok,$dataupdated);
  }
  $splice_value=array_splice($dataok,0,$field_number);
  $sql=implode(" AND ",$splice_value);
  echo "<td id='cor' align='center'>";
  echo "<form method='POST' action='delete_row.php'>
  <input type='hidden' value='$db' name='db'>
  <input type='hidden' value='$table' name='table'>";
  ?>
  <input type="hidden" value="<?php echo $sql; ?>" name="sql">
  <?php
  echo "<input type='image' src='image/Redcross.png' name='image' height='20px' width='20px'>
  </form>
  </td>";
  echo "<td id='cor' align='center'>
  <form method='POST' action='update_row.php'>
  <input type='hidden' value='$db' name='db'>
  <input type='hidden' value='$table' name='table'>";
  ?>
  <input type="hidden" value="<?php echo $sql; ?>" name="sql">
  <?php
  echo "<input type='image' src='image/edit-icon.png' name='image' height='20px' width='20px'>
  </form></td></tr>"; 

 }
 echo "</table>";

?>
</td>
</tr>
</table>

</td>
</tr>
</table>

</td>
</tr>
</table>
</body>
</html>
