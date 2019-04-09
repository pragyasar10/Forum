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
  
//Select the Subforum based on $_GET['subforumid']  
$sql = "SELECT 
            subforumid, 
            subforumname
        FROM 
            subforums 
        WHERE 
            (subforumid = $_GET[id])";  
  
$result = mysql_query($sql);  
  
if(!$result)  
{  
    echo 'The subforum could not be displayed, please try again later.' . mysql_error();  
}  
else  
{  
    if(mysql_num_rows($result) == 0)  
    {  
        echo 'No topics are present in this subforum.';  
    }  
    else //Display topics 
    {  
        while($row = mysql_fetch_assoc($result))  
        {  
            echo '<center><h2>Topics in ' . $row['subforumname'] . ' subforum</h2></center>';  
        }  
  
    $sql="SELECT topics.topicid,topics.topicname,topics.topicpost,topics.poster,users.userid,users.username FROM topics LEFT JOIN  users ON topics.poster = users.userid WHERE  topics.subforumid = $_GET[id]";  
		
  
        $result = mysql_query($sql);  
  
        if(!$result)  echo '<center><br/>The topics could not be displayed, please try again later.'; 
          
        else  
        {  
            if(mysql_num_rows($result) == 0)  
            echo '<center><br/>There are no topics in this subforum yet.';  
            else {  
                echo '<center><table border="1" width="600"><tr><th>Topic</th><th>Created by</th> ';
						
			if(($_COOKIE["admin"])||($row['userid']==$_COOKIE['userid'])) 
		echo'<th>DELETE</th> <th>EDIT</th> 
						
                      </tr>';   
					   
                while($row = mysql_fetch_assoc($result))  
                { 
				            echo '<tr>';  
                            echo '<td><h3><a href="topic.php?id=' . $row['topicid'] . '">' . $row['topicname'] . '</a><h3></td>';  
							echo '<td><h3>' . $row['username'] . '</a><h3></td>';
							if(($_COOKIE["admin"])||($row['userid']==$_COOKIE['userid']))
				{
					echo '<td><h3><a href="deletetopic.php?id=' . $row['topicid'] . '">' . "DELETE THIS TOPIC" . '</a><h3></td>
					<td><h3><a href="edittopic.php?id=' . $row['topicid'] . '">' . "EDIT THIS TOPIC" . '</a><h3></td></tr>'; 
					} 
                            echo '</tr>';  
                }  
            }  echo '</table><center>';
        }  
    }  
}  
    
echo '<br/><center><a href="addtopic.php?id='.$_GET['id'].'">ADD TOPIC</a>';
}?>  
</body>
</html>