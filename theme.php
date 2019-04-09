<!--Define theme settings for the user -->
<html>
<body>

<?php
session_start();

if((!isset($_COOKIE["cooky"]))&&(!isset($_SESSION["user"])))
{echo "You are not authorized to view this page!<br/>".'<a href="login.php">Please login to view this page</a>';
die();}

//Only signed in users can access resources
if(isset($_SESSION["user"]))echo '<center>'."Hello		".$_SESSION['user']."!".'</center>';
if(isset($_COOKIE["cooky"]))echo'<center>'. "	and		"."Welcome back		".$_COOKIE["cooky"]."!".'</center>';
?>

<table width="500" border="0" align="center" cellpadding="0" cellspacing="1"
bgcolor="#CCCCCC">

<tr>
<td>
<form  action="changer.php" method="POST">		<!--Direct settings to theme changing file-->
<table width="500" border="0" align="left" cellpadding="0" cellspacing="1" bgcolor ="WHITE">

<tr>
<td colspan="2"><strong><center> Theme </center></strong></td>
</tr>

<tr>
<th width="200">Please choose font size:</th>
<td width="300">
<select name="fonty">
<!--If no option is selected, previously stored theme will be displayed -->

<option value="<?php echo $_COOKIE["fonts"];?>" selected="selected">Please Select</option>
<option value="1" >1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
</select>
</td>
</tr>

<tr>
<th width="200">Please choose background color:</th>
<td width="300">
<select name="bgc">
<!--If no option is selected, previously stored theme will be displayed -->

<option value="<?php echo $_COOKIE["bcgcol"]; ?>" selected="selected">Please Select</option>
<option value="#FFFFFF" >WHITE</option>
<option value="#000000">BLACK</option>
</select>
</td>
</tr>


<tr>
<th width="200">Please choose font color:</th>
<td width="300">
<select name="fc">
<!--If no option is selected, previously stored theme will be displayed -->


<option value="<?php echo $_COOKIE["fontcol"]; ?>" selected="selected">Please Select</option>
<option value="#000000" >BLACK</option>
<option value="#FFFFFF" >WHITE</option>
</select>
</td>
</tr>

<tr>
<td>&nbsp;</td>
<td><input type="submit" value="Submit" /></td>
</tr>

<tr>
<td colspan="2" ><center><a href="logout.php" >LOGOUT</a></center></td>
</tr>
</table>

</form>
</td>
</tr>
</table>

</html>
