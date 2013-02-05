<?php
session_start();
include ('package/adduser_page.php');
if($_SESSION['login']=='admin')
{
display_adduser();
//add_users_page();
}
else
{
echo "end of session";
}
?>