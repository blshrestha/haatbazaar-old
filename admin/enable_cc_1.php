<?php
session_start();
include("package/connect_to_database.php");
include("package/display_enable_cc.php");

connect_to_database();
if($_SESSION['login']!="admin")
{
die ("session has expired");
}
display_enablecc();

?>