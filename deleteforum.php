<html>
<head>
<link REL="StyleSheet" TYPE="text/css" HREF="style1.css">
</head>
<body>
<div align="right" ><u><?php echo 'HELLO	'.$_COOKIE['username'];?></u><br/><br/><a href="logout.php"> LOGOUT</a><br/><br/><a href="home.php"> HOME</a></div>



<?php
if(!isset($_COOKIE["signedin"]))
{header('location:login.php');
die();}

else
{
$connection = mysql_connect("localhost","root",""); 
mysql_select_db("mydb",$connection);

$sql="DELETE FROM forums WHERE forumid=$_GET[id]";

if(mysql_query($sql)) 
echo '<center>'.'<a href="index.php">Go back to home</a>'.'</center>';

else echo '<center>'."Error deleting forum".mysql_error().'</center>';
}
?>

</body>
</html>