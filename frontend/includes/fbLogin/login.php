<?php
	include_once "config.php";
	$redirectURL = "http://localhost:81/fbLogin/fb-callback.php";
	$permissions = ["email"];
	$loginURL = $helper->getLoginUrl($redirectURL,$permissions);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Test Login FB</title>
</head>
<body>
	<input type="button" onclick="window.location='<?php echo $loginURL?>'" value="Login">
</body>
</html>