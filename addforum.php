<html>
<head>
<link REL="StyleSheet" TYPE="text/css" HREF="style2.css">
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

if(!isset($_POST['Add']))  			//Form isn't filled, display it
{echo 
'<center><form method="POST" action="">
Forum name: <input type="text" name="forumname" /> <br/> 
Add forum:<input type="submit" name="Add" />
</form></center>'; 
}
 
else{								//Form is filled, process it
$sql = mysql_query("INSERT INTO forums(forumname) VALUES('$_POST[forumname]') ");
	
if(!$sql) echo 'Error: ' . mysql_error();  

else echo '<br/><center>New forum successfully added.</center><br/>'.'<a href="index.php"><center>Go to forum</a></center>';
	}
}
?>  

</body>
</html>