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
   <!--   show all databases    -->
<?php
	$con=mysql_connect('localhost',$user,$password);
	$qu='show databases';
	$res=mysql_query($qu);
	echo "<table border='0' height='450px' width='190px' bgcolor='grey'>";
	while($row=mysql_fetch_array($res))
	{
	$db=$row['Database'];
	echo "<tr><td><img src='image/database.png' height='20px' width='20px'></td><td style='font-family:arial; color:white;font-size:14px;font-weight:bold; 		text-decoration:none;'>";
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
  <!--   fetch values of db,table,field    -->
<?php
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
?>

<!--   form to fill fields    -->
<form action="createtable_action.php?fl=<?php echo $f; ?>&amp;table=<?php echo $table; ?>&amp;db=<?php echo $db; ?>" method='POST'>
<?php
	for($i=0;$i<$f;$i++)
	{
?>
<table style='font-family:arial; color:#444; font-size:14px; text-decoration:none;'>
<tr>
<td>
Field 
</td>
<td>
<input type='text' name='field<?php echo $nu;?>' id='field1'>
</td>
</tr>
<tr>
<td>
Type
</td>
<td>
<select name='type<?php echo $nu;?>'>
  <option value='INT'>INT</option>
  <option value='VARCHAR'>VARCHAR</option>
  <option value='TEXT'>TEXT</option>
  <option value='BIGINT'>BIGINT</option>
  <option value='FLOAT'>FLOAT</option>
  <option value='DOUBLE'>DOUBLE</option>
  <option value='DATE'>DATE</option>
  <option value='REAL'>REAL</option>
</select>
</td>
</tr>
<tr>
<td>
Length
</td>
<td>
<input type='text' name='length<?php echo $nu;?>' id='length'>
</td>
</tr>
<tr>
<td>
Auto_increment
</td>
<td>
<input type='checkbox' name='auto<?php echo $nu;?>' value='AUTO_INCREMENT'> 
</td>
</tr>
<tr>
<td>
Index
</td>
<td>
<select name='index<?php echo $nu;?>'>
  <option value=''>---</option>
  <option value='PRIMARY KEY'>PRIMARY</option>
  <option value='UNIQUE'>UNIQUE</option>
  <option value='INDEX'>INDEX</option>
  <option value='FULLTEXT'>FULLTEXT</option>
</select>
</td>
</tr>
<tr>
<td colspan='2'>
<hr/ width='400px'>
</td>
</tr>
</table>

<?php
$nu++;
}
?>
<input type="hidden" value="<?php echo $db; ?>" name="db">
<input type="hidden" value="<?php echo $table; ?>" name="table">
<input type="hidden" value="<?php echo $f; ?>" name="field">
<input type='submit' value='Save' name='submit'>
</form>
<!--   end of form    -->

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
