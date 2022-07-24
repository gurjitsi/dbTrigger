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
<td width='200px'>

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
	$con=mysql_connect("localhost",$user,$password);
	if(!$con)
	{
	header("location:index.php?login=false");
	}
	$qu='show databases';
	$res=mysql_query($qu);
	echo "<table border='0' height='450px' width='190px' bgcolor='grey'>";
	while($row=mysql_fetch_array($res))
	{
	$db=$row['Database'];
	echo "<tr><td><img src='image/database.png' height='20px' width='20px'></td><td style='font-family:arial; color:white; font-size:14px; font-weight:bold; 	 text-decoration:none;'>";
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
<form method='POST' action='createdatabase.php'>
<label style='font-family:arial; color:#444; font-size:14px; text-decoration:none;'>Create new database</label>
<input type='text' name='db' id='db'>
<input type='submit' value='create' name='sub'>
</form>
</td>
</tr>
<tr>
<td>
<!--    about phpmyadmin      -->
<table height='250px' width='660px' align='center' id='cor22' border='2'>
<tr height='30px'>
<td bgcolor='grey' style='font-weight:bold;color:white;font-size:14px;' align='center'>
WEBSERVER
</td>
<td bgcolor='grey' style='font-weight:bold;color:white;font-size:14px;' align='center'>
MYSQL
</td>
<td bgcolor='grey' style='font-weight:bold;color:white;font-size:14px;' align='center'>
PHP
</td>
</tr>
<tr>
<td width='220px' style='border: 1px solid black;border-style:dotted; border-color:black;font-weight:bold;color:#444;font-size:14px;' valign='top'>
<?php
	system('httpd -v');
?>
</td>
<td width='220px' style='border: 1px solid black;border-style:dotted; border-color:black;font-weight:bold;color:#444;font-size:14px;' valign='top'>
<?php
	system('mysql -V');
?>
</td>
<td style='border: 1px solid black;border-style:dotted; border-color:black;font-weight:bold;color:#444;font-size:14px;' valign='top'>
<?php
	system('php -v');
?>
</td>
</tr>
<tr height='30px'>
<td bgcolor='grey' style='font-weight:bold;color:white;font-size:14px;' align='center'>
MYSQLtrigger
</td>
</tr>
<tr>
<td colspan='3' style='border: 1px solid black;border-style:dotted; border-color:black;font-weight:bold;color:#444;font-size:14px;'>
dbTrigger version 1.0 <br/>
<a href='https://gurjit.co' style='text-decoration:none;color:orange;'>Developer</a><br/>
</td>
</tr>
</table>
<!--   end of about pma     -->
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
