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

else{

$connection = mysql_connect("localhost","root",""); 
mysql_select_db("mydb",$connection);
  
if(!isset($_POST['Add']))			//Display form if it isn't submitted
{echo 
'<center><form method="POST" action="">  
Subforum name: <input type="text" name="subforumname" /><br/>  
Add subforum:<input type="submit" name="Add" />  
</form></center>';
}
 
else								//Else process form
{ 
$sql = mysql_query("INSERT INTO subforums(forumid,subforumname) VALUES('$_GET[id]','$_POST[subforumname]') ");

if(!$sql)echo '<br/><center>Error adding new subforum:'.mysql_error();

else echo'<br/><center>New forum successfully added.<br/>'.'<a href="index.php"><center>Go to forum</center></a>';
 }  
}

?>
</body>
</html>