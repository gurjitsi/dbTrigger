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

<table height="30px" width="250" border='0'>

<tr>
                                    <td align='center' width='160px'><a style='font-family:arial; color:#444; font-size:14px; font-weight:bold; text-decoration:none;' href='main.php'><img src='image/home.png' width='50px' height='50px'><br/>Home</a></td>

				     <td align='center' width='160px'><a style='font-family:arial; color:#444; font-size:14px; font-weight:bold; text-decoration:none;' href='databases.php'><img src='image/database.png' width='50px' height='50px'>Databases</a></td>

                                    <td align='center' width='160px'><a style='font-family:arial; color:#444; font-size:14px; font-weight:bold; text-decoration:none;' href='logout.php'><img src='image/import.png' width='50px' height='50px'>Logout</a></td>

					 </tr>

</table>

</td>
</tr>
<tr>
<td valign='top'>
<?php
$db=$_GET['db'];
?>
<form method='POST' action="createtable.php?db=<?php echo $db; ?>">
<label style='font-family:arial; color:#444; font-size:14px; text-decoration:none;'>Create new table</label>
<input type='text' name='table' id='table'> &nbsp;
<label style='font-family:arial; color:#444; font-size:14px; text-decoration:none;'>Fields</label>
<input type='text' name='field' id='field'>
<input type='submit' value='Go' name='sub1'>
</form>
<br/><br/>
<?php
$db=$_GET['db'];
//echo $db;
$con=mysql_connect('localhost',$user,$password);
$qu="SHOW TABLES FROM $db";
$res=mysql_query($qu);
echo "<table id='cor22' align='center'><tr bgcolor='grey'><td style='color:white;font-weight:bold;' colspan='2'>Tables of $db database</td></tr>";
while($row=mysql_fetch_array($res))
{
$table=$row[0];
echo "<tr><td id='cor'><a href='delete_table.php?deletetable=$table&amp;db=$db'><img src='image/Redcross.png' alt='drop' height='20px' width='20px'></a></td><td id='cor'>";
echo "<a style='color:black; text-decoration:none; font-weight:bold;' href='showtables.php?table=$table&db=$db'>$table</a>";
echo "</td></tr>";
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
