<?php  //added by shakeel
include("package/display_admin_home.php");
include("package/display_heading.php");
echo "
<html>
<head>
<title>Admin home</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; utf-8\">
</head>
<body >
";

displayheading("ADMINISTRATOR HOME","");
display_admin_home();
echo "</body></html>";
?>