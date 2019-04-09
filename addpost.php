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
  
if(!isset($_POST['submit'])) 							//Form isn't filled, display it
echo 
'<form method="POST" action=""><center>
Enter your post:
<br/><br/><textarea rows="10" cols="30" name="post" ></textarea><br/><br/>
Add post:<input type="submit" name="submit" /></center>
</form>'; 
 
else{													//Form is filled, process it

$sql = mysql_query("INSERT INTO posts(post,poster,topicid) VALUES ('$_POST[post]','$_COOKIE[userid]','$_GET[id]')"); 
 
if($sql) echo '<center><br/>Your post has been saved <br/><a href="index.php"><center>Go to forum</center></a>'; 

else echo "error".mysql_error();}
}
?>  

</body>
</html>