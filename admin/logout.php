<?php
session_start();

$_SESSION["login"]="";		

session_unregister("login");
header("Location: ../admin/index.htm");

?>