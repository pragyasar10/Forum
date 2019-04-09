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
	
if(!isset($_POST["submit"]))				//Form isn't filled, display it

echo'<center>
<form action="" method="POST">
Enter new name of the subforum:<input type="text" name="name" />
<input type="submit" name="submit"></center>';

else{										//Form is filled rocess it
$sql=mysql_query("UPDATE subforums SET subforumname='$_POST[name]' WHERE subforumid='$_GET[id]'");
	
if($sql)echo "<center><br/>Edited successfully".'<a href="index.php">Go back to the forum</a>';

else echo "Error occurred while editing:".mysql_error();	}
}
?>

</body>
</html>