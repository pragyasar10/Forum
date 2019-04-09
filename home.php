<html>
<head>
<style type="text/css">
body{ background-color:#FC9 }
</style>
</head>
<body>

<?php

echo
	'<center><h1>PROJECT 1</h1></center></br></br>
	<h3><form action="" method="POST" align="center">
	Enter your text: <input type="text" name="string" />
	<input type="submit" name="submit"/>
	<input type="submit" value="Reset"/>
	</form>
	</h3><hr />';

if(isset($_POST["submit"])){
	$b=array($_POST["string"]);
	$arr=implode("",$b);
	$a=strlen($arr);

for($i=0;$i<=$a-1;$i++){
	for($j=0;$j<=$a-1-$i;$j++)
	echo  "&nbsp";
	for($k=$i;$k>=0;$k--)
	echo $arr[$k];
	echo"<br/>";		}
							}

?>

</body>
</html>