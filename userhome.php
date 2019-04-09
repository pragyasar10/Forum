<html>
<head>
<style type="text/css">
body{text-align:center;}
</style>
</head>

<?php
session_start();
if((!isset($_COOKIE["cooky"]))&&(!isset($_SESSION["user"])))
{echo "You are not authorized to view this page!".'<a href="login.php">Please login to view this page</a>';
die();}
?>

<!--Insert stored values in desired html fields -->
<body bgcolor= "<?php echo $_COOKIE["bcgcol"]; ?>" >
<font color= "<?php echo $_COOKIE["fontcol"]; ?>" size="<?php echo $_COOKIE["fonts"]; ?>">

<?php
if(isset($_SESSION["user"]))echo "Hello		".$_SESSION['user'];	//Session is set
if(isset($_COOKIE["cooky"]))echo "and Welcome back		".$_COOKIE["cooky"];	//User will be kept signed in
?>

</br>
<a href="logout.php">Logout</a>
<a href="theme.php">Change Theme</a>
</body>
</html>
