<?php
include ("package\connect_to_database.php");

connect_to_database();


$query= "CREATE TABLE ccinfo (ccid varchar(50) primary key,address varchar(255),password varchar(255) ,email varchar(255))";
$result= mysql_query($query);
if(!$result)
{


die ("query could not be executed probably due to duplicate name. Click back and try again by using other name.<br>");

}
$query= "INSERT INTO ccinfo VALUES ('admin','unavaliable','admin','admin@haatbzzar.com') ";
$result= mysql_query($query);
if(!$result)
{


die ("query could not be executed probably due to duplicate name. Click back and try again by using other name.<br>");

}
?>