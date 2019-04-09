<html>
<body bgcolor="#FFCC99">

<?php
session_start();

$connection = mysql_connect("localhost","root",""); 
mysql_select_db("db",$connection);

if(!isset($_POST["submit"]))
echo 
'<table width="400" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="WHITE">

<tr><form action="" method="POST">

<td><table width="400" border="0" align="center" cellpadding="14" cellspacing="1" bgcolor ="WHITE">

<tr><td colspan="2"><strong><center>LOGIN</center></strong></td></tr>

<tr><th width="200">Username:</th>

<td width="200"><input type="text" name="name" id="name" /></td></tr>

<tr><th width="200">Password:</th><td width="400"><input type="password" name="pass" id="pass" /></td></tr>



<tr><td colspan="2">Keep me logged in : <input type="checkbox" name="choice" value="1"></td>

<td><input type="submit" name="submit" /></td></tr>

<tr><td colspan="2"><a href="register.php">If you are a new user, please register</a></td></tr>

</form>
</table>
</td>
</tr>
</table>';

else{
	
$sql=mysql_query("SELECT * FROM mytable WHERE Username='$_POST[name]' AND Password='$_POST[pass]' ");

$row= mysql_fetch_row($sql);

if($row){
	
$_SESSION["user"]=$_POST["name"];

if(isset($_POST['choice']) && $_POST['choice']='1'){
setcookie("cooky",$_POST['name'],time()+999999);}			//If user wishes to be kept signed in


if(!isset($_COOKIE["fonts"])){								//If user signs in for the first time,assign default values to the theme parameters
setcookie("fonts","1",time()+999999);
setcookie("bcgcol","#FFFFFF",time()+999999);
setcookie("fontcol","#000000",time()+999999);}

header('location:userhome.php');}

if(!$row)echo '<a href="login.php">Wrong name/password..Please login again</a>';
}
mysql_close($connection);
?>

</body>
</html>
