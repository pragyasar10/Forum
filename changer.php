<?php 
setcookie("fonts",$_POST["fonty"],time()+999999);
setcookie("bcgcol",$_POST["bgc"],time()+999999);
setcookie("fontcol",$_POST["fc"],time()+999999);
header('location:userhome.php');
?>