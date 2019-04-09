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

//Select the forums present 
$sql = "SELECT * FROM forums";  
  
$result = mysql_query($sql);  
  
if(!$result)  echo 'The forums could not be displayed, please try again later.' . mysql_error();  
  
else  
{  
    if(mysql_num_rows($result) == 0)   
        echo 'No forums exist.';  
    
    else  
    {  echo '<h3><center><u>FORUMS IN THIS SITE</center></u></h3></br><center><table border="1" width="500"> 
             <tr><th >FORUMS</th>';
			if($_COOKIE["admin"]) 									//Only admin can do this
			echo'<th >DELETE</th> <th >EDIT</th></tr>';   
  
       while($row = mysql_fetch_assoc($result))  
                {echo '<tr><td><h3><a href="forum.php?id=' . $row['forumid'] . '">' . $row['forumname'] . '</a><h3></td>';
				
				if($_COOKIE["admin"])								//Only admin can do this
				{echo '<td><h3><a href="deleteforum.php?id=' . $row['forumid'] . '">' . "DELETE THIS FORUM" . '</a><h3></td>
				<td><h3><a href="editforum.php?id=' . $row['forumid'] . '">' . "EDIT THIS FORUM" . '</a><h3></td></tr>'; 
				}
				}  echo '</center></table>';
    }
}  
     
if($_COOKIE["admin"])												//Only admin can do this
echo '<a href="addforum.php">ADD FORUM</a>';
}
?> 

</body>
</html> 