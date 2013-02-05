<html>
<body>
<?php
session_start();
if((session_is_registered("login"))&&($_SESSION["login"]=="admin"))
{
	echo "<div class=warning align=center>You are already logged in as <strong><em> ".$_SESSION["login"]." </em></strong>
			<br><br>
			<a href='admin_home1.php'><img align='middle' alt='Continue' src='../images/continue.png'></a> 
			<br><br>
			";
	
}
else
{
	header("Location: index.htm");
}
?>

</body> 
</html>
