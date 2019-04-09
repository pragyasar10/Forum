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

session_start();
$connection = mysql_connect("localhost","root",""); 
mysql_select_db("mydb",$connection); 

if(!isset($_POST['submit']))						//Display form if it isn't submitted
{echo
'<center>
<form action="" method="POST">
Topic name:<input type="text" name="topicname" /><br/><br/>
Enter your topic post:<br/><br/><textarea rows="10" cols="30" name="post" ></textarea><br/><br/>
<input type="submit" name="submit"></center>';}

else {												//Form is filled, process it
	
$sql=mysql_query("INSERT INTO topics (poster,subforumid,topicname,topicpost) VALUES ('$_COOKIE[userid]','$_GET[id]','$_POST[topicname]','$_POST[post]')");

if(!$sql)echo '<br/><center>Error adding new topic:'.mysql_error();

else echo'<br/><center>New topic successfully added.<br/>'.'<a href="index.php"><center>Go to forum</center></a>';
}
}
?>
</body>
</html>