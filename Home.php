<html>
<body bgcolor="#FFCC99">

<?php
session_start();

if((isset($_COOKIE["cooky"]))||(isset($_SESSION["user"])))	//If user is logged in/decides to be kept logged in, direct him to Home Page
{ if(!isset($_SESSION["user"]))$_SESSION["user"]=$_COOKIE["cooky"];	//For users who wish to be kept signed in
header('location:userhome.php');}

else
echo
'<h1><center><u>PROJECT 2</u></center></h1>
<table border="1" width="500" align="center" cellpadding="14" >
<tr><td><center><a href="register.php">NEW USER PLEASE CLICK HERE</a></center></td></tr>
<tr><td><center><a href="login.php">OLD USER PLEASE CLICK HERE</a></center></td></tr>
</table>';

?>

</body>
</html>