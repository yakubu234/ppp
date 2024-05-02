<?php

if($_POST){
	$_POST['description'];
	echo  htmlentities(htmlentities($_POST['description'], ENT_QUOTES), ENT_QUOTES);
	die;
}


?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="POST" action="#">
	<textarea name="description" ></textarea>
	<input type="submit" name="name" value="value">
</form>
</body>
</html>