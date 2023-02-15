<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header ('Location:webpage/login.php');
	}
	else{
		header ('Location:webpage/home.php');
		// echo $_SERVER['DOCUMENT_ROOT'];
		// header ('Location:webpage/login.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MSWD RECORD KEEPING SYSTEM</title>

</head>
<body>

</body>
</html>