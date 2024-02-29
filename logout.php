<?php 
ob_start();
session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
</head>
<body>
<?php 
unset($_SESSION['login']);
session_destroy();

ob_end_flush();
header("Location: index.php");
?>
</body>
</html>