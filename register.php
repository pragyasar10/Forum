<html>
<body bgcolor="#FFCC99">

<?php

$connection = mysql_connect("localhost","root",""); 
mysql_select_db("db",$connection);

if(!isset($_POST["submit"])) //Form isn't filled, so it is displayed
echo '
<table width="500" border="0" align="center" cellpadding="0" cellspacing="1"
bgcolor="#CCCCCC">

<tr><td>
<table width="500" border="0" align="left" cellpadding="0" cellspacing="1" bgcolor ="WHITE">

<form action="" method="POST">
<tr><td colspan="2"><strong><center>Registration </center></strong></td></tr>

<tr><th width="200">Username:</th><td width="400"><input type="text" name="name" /</td></tr>
 
<tr><th width="200">Password:</th><td width="400"><input type="password" name="pwd" /></td></tr>
 
<tr><td>&nbsp;</td><td><input type="submit" name="submit" /></td></tr>

<tr><td>&nbsp;</td><td><a href="login.php">ALREADY A USER? PLEASE LOGIN</a></td></tr>
</form></table>

</td></tr></table>';


else{			//Form is filled, so it is processed

$sql="INSERT INTO mytable (Username,Password) VALUES ('$_POST[name]','$_POST[pwd]')";

if (mysql_query($sql,$connection))  header('location:login.php');

else  echo "Username already exists..<br/>".'<a href="register.php">Please register again..</a>';}
 
mysql_close($connection);
 ?>
 


</body>
</html>	