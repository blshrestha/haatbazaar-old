<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Add Item</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="default.css" rel="stylesheet" type="text/css">
</head>
<?php
include("functions.php");

  if(!(@$_GET["submit"]=="additem"))
  {
    include("inc/additeminterface.php");
  }
  else
  {
	additem($_POST['name'],$_POST['description'],$_POST['category'],$_POST['price'],'1',connectdb());
  }
?>
</html>
