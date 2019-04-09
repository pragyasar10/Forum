<html>
<body bgcolor="#FFCC99">

<?php
    session_start();  
    session_unset();
	session_destroy();						//Destroy the session
	setcookie("cooky","",time()-99999);		//Unset the cookies
	setcookie("fonts","",time()-99999);
	setcookie("bcgcol","",time()-99999);
	setcookie("fontcol","",time()-99999);

echo '<center>'."You have successfully logged out..All the site data cleared.."."<br/>".'<a href="Home.php">Go to the home page</a></center>'; 	
?>

</body>
</html>