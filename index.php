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
<td height='150px' align='center'>
<br/>
<img src='image/logo.png' height='120px' width='400px'>
<br/><br/>
<span style='font-family:arial; color:#444; font-size:20px; font-weight:bold; text-decoration:none;'>dbTrigger 1.0</span>
</td>
</tr>
<tr>
<td align='center'>
<form action='login_script.php' method='POST'>
<table bgcolor='grey' id='cor22'>
<tr>
<td style='font-family:arial; color:silver; font-size:14px; font-weight:bold; text-decoration:none;' colspan='2'>
Please enter mysql server username and password
<hr/>
</td>
</tr>
<tr>
<td style='font-family:arial; color:white; font-size:14px; font-weight:bold; text-decoration:none;'>
Username :
</td>
<td>
<input type='text' name='username'>
</td>
</tr>
<tr>
<td style='font-family:arial; color:white; font-size:14px; font-weight:bold; text-decoration:none;'>
Password :
</td>
<td>
<input type='password' name='password'>
</td>
</tr>
<tr>
<td colspan='2' align='right'>
<br/>
<input type='submit' name='login' value='login'>
</td>
</tr>
<tr>
<td colspan='2' style="color:red; ">
<?php
if(isset($_GET['login']))
echo "*Please enter correct username and password";
?>
</td>
</tr>
</table>
</form>
</td>
</tr>
</table>
</body>
</html>
