<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Control Center Panel</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../default.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
//session_start();
//this is commented and placed above by Ramesh Raj Baral @ April 13 2010
if(session_is_registered("login"))
{
session_start();
	echo "<div class=warning align=center>You are already logged in as <strong><em> ".$_SESSION["login"]." </em></strong>
			<br><br>
			<a href='additem.php'><img align='middle' alt='Continue' src='../images/continue.png'></a> 
			<br><br>
			<a href='login.php'>Login as Different User</a>";
	
}
else
{
	header("Location: login.php");
}
?>

</body> 
</html>
