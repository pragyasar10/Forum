<html>
<head>
<link REL="StyleSheet" TYPE="text/css" HREF="style.css">
</head>
<body>
<div align="right" ><u><?php echo 'HELLO	'.$_COOKIE['username'];?></u><br/><br/><a href="logout.php"> LOGOUT</a><br/><br/><a href="home.php"> HOME</a></div>

<?php 
if(!isset($_COOKIE["signedin"]))
{
	header('location:login.php');
	die();
}
else
{ 
$connection = mysql_connect("localhost","root",""); 
mysql_select_db("mydb",$connection);
  
//Select the topic based on $_GET['topicid']  
$sql = "SELECT 
            topicid, 
            topicname,
			topicpost
        FROM 
            topics 
        WHERE 
            (topicid = $_GET[id])";  
  
$result = mysql_query($sql);  
  
if(!$result)  
{  
    echo '<center><br/>The topic could not be displayed, please try again later.' . mysql_error();  
}  
else  
{  
    if(mysql_num_rows($result) == 0)  
    {  
        echo '<center><br/>No posts exist.';  
    }  
    else  
    {  
        //Display topic data  
        while($row = mysql_fetch_assoc($result))  
        {  
            echo '<h2><center><br/>Posts in ' . $row['topicname'] . ' topic</h2>'.'</br><center>'.$row['topicpost'];  
        }  
  
        $sql="SELECT
		posts.postid,  
    posts.topicid, 
    posts.post,  
    posts.poster,  
    users.userid,  
    users.username  
FROM  
    posts  
LEFT JOIN  
    users  
ON  
    posts.poster = users.userid  
WHERE  
    posts.topicid = $_GET[id]";  
		
  
        $result = mysql_query($sql);  
  
        if(!$result)  
        {  
            echo '<center><br/>The posts could not be displayed, please try again later.';  
        }  
        else  
        {  
            if(mysql_num_rows($result) == 0)  
            {  
                echo '<center><br/>There are no posts in this topic yet.';  
            }  
            else  
            {  
                echo '<center><table border="1" width="500"> 
                      <tr> 
                        <th>Post</th> 
                        <th>Created by</th>';
						if(($_COOKIE["admin"])||($row['userid']==$_COOKIE['userid'])) //Admin can also do this
		echo'<th>DELETE</th> <th>EDIT</th>  
                      </tr>';   
					   
                while($row = mysql_fetch_assoc($result))  
                { 
				            echo '<tr>';  
                            echo '<td><h3>'.$row['post'] . '</a><h3></td>';  
							echo '<td><h3>' . $row['username'] . '</a><h3></td>';
							if($_COOKIE["admin"]||$row['userid']==$_COOKIE['userid']) //Admin can also do this
				{
					echo '<td><h3><a href="deletepost.php?id=' . $row['postid'] . '">' . "DELETE THIS POST" . '</a><h3></td>
					<td><h3><a href="editpost.php?id=' . $row['postid'] . '">' . "EDIT THIS POST" . '</a><h3></td></tr>'; 
					} 
                            echo '</tr>';  
                }  
            }  echo '</table></center>';
        }  
    }  
}  
echo '<center><br/><a href="addpost.php?id='.$_GET['id'].'">ADD POST</a>';
}?> 
</body>
</html> 