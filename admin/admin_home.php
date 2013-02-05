<?php
session_start();
include("package/connect_to_database.php");
include("package/display_heading.php");
include("package/display_admin_home.php");

echo "
<html>
<head>
<title>Admin home</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
</head>
<body >
";

displayheading("ADMINISTRATOR","HOME");
if($_SESSION['login']!="admin")
{
die ("Session has expired.Relogin");
}
connect_to_database();
display_admin_home();
echo "</body></html>";
?>
