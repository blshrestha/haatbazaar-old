<?php
session_start();
include("package/connect_to_database.php");
include("package/display_disable_cc.php");

connect_to_database();
if($_SESSION['login']!="admin")
{
die ("session has expired");
}
$disable = display_disablecc();
if(!$disable){
	echo "<br>could not be disabled!!";	
}
else{
	echo "<br>User disabled successfully";
}

?>