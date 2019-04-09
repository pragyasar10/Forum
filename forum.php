<html>
<head>
<link REL="StyleSheet" TYPE="text/css" HREF="style.css">
</head>
<body>
<div align="right" ><u><?php echo 'HELLO	'.$_COOKIE['username'];?></u><br/><br/><a href="logout.php"> LOGOUT</a><br/><br/><a href="home.php"> HOME</a></div>

<?php  

if(!isset($_COOKIE["userid"]))
{header('location:login.php');
die();}

else{
	
$connection = mysql_connect("localhost","root",""); 
mysql_select_db("mydb",$connection);  
						//Select the forum based on $_GET['id']  
$sql = "SELECT forumid,forumname  FROM forums WHERE (forumid = $_GET[id])";  
  
$result = mysql_query($sql);  
  
if(!$result) 
    echo '<center><br/>The forum could not be displayed, please try again later.' . mysql_error();  
	  
else  
{  
    if(mysql_num_rows($result) == 0)echo '<center><br/>No subforums exist.';  
     
    else  
    {  
        //Display forum
     while($row = mysql_fetch_assoc($result)){  
     echo '<h3><u><center><br/>Subforums in ' . $row['forumname'] . ' forum</h3></center></u><br/>';  
        										}  
  
        //Display subforum  
        $sql = "SELECT subforumid, subforumname FROM subforums WHERE forumid = $_GET[id]";  
  
        $result = mysql_query($sql);  
  
        if(!$result)echo '<center><br/>The subforums could not be displayed, please try again later.';  
         
        else  
        {   if(mysql_num_rows($result) == 0) echo '<center>There are no subforums in this forum yet.';  
             
            else  
            {  echo '<center><br/><table border="1" width="600"><tr><th>Subforum</th>';
			
			if($_COOKIE["admin"])echo'<th>DELETE</th> <th>EDIT</th></tr>';   
  
             while($row = mysql_fetch_assoc($result))  
                {echo '<tr><td><h3><a href="subforum.php?id=' . $row['subforumid'] . '">' . $row['subforumname'] . '</a><h3>';  
                 echo '</td>';
				 
				 if($_COOKIE["admin"]){
				echo '<td><h3><a href="deletesubforum.php?id=' . $row['subforumid'] . '">' . "DELETE THIS SUBFORUM" . '</a><h3></td>
				<td><h3><a href="editsubforum.php?id=' . $row['subforumid'] . '">' . "EDIT THIS SUBFORUM" . '</a><h3></td></tr>'; 
									}
                }  echo '</table>';
            }
		}}}
		
if($_COOKIE["admin"]) echo '<a href="addsubforum.php?id='.$_GET['id'].'">ADD SUBFORUM</a>';
}
?>  
</body>
</html>