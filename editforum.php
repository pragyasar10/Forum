<html>
<head>
<link REL="StyleSheet" TYPE="text/css" HREF="style.css">
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

if(!isset($_POST["submit"]))echo					//Form isnot submitted, display it
'<center><form action="" method="POST">
Enter new name of the forum:<input type="text" name="name" />
<input type="submit" name="submit"></center>';

else{												//Update contents
$sql=mysql_query("UPDATE forums SET forumname='$_POST[name]' WHERE forumid='$_GET[id]'");

if($sql)echo "<center><br/>Edited successfully".'<a href="index.php">Go back to the forum</a>';

else echo "Error occurred while editing:".mysql_error();
	}
}
?>

</body>
</html>